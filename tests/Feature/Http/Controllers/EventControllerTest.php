<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\EventController;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EventController
 */
class EventControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;

    /** @test */
    public function it_can_render_lists_event_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('event.index'));

        $response->assertOk();
        $response->assertSeeText(trans('events.plural-name'));
        $response->assertViewIs('event.index');
    }

    /** @test */
    public function it_can_process_datatable_event_ajax(): void
    {
        $this->assertHasDatatable(route('event.index'));
    }

    /** @test */
    public function it_can_render_create_event_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('event.create'));

        $response->assertOk();
        $response->assertViewIs('event.create-or-edit');
        $response->assertViewHas('isOnCreateState', true);
    }

    /** @test */
    public function it_can_process_to_store_event(): void
    {
        $this->assertActionUsesFormRequest(
            EventController::class,
            'store',
            EventStoreRequest::class
        );

        $this->assertEquals(0, Event::query()->count());

        $data = Event::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->post(route('event.store'), $data);

        $response->assertSessionHasNoErrors();

        $response->assertRedirect(route('event.index'));

        $this->assertEquals(1, Event::query()->count());

        /** @var \App\Models\Event $event */
        $event = Event::first();
        $this->assertEquals($data['name'], $event->name);
        $this->assertEquals($data['organizer_name'], $event->organizer_name);
        $this->assertEquals($data['type'], $event->type->value);
        $this->assertEquals($data['external_url'], $event->external_url);
        $this->assertEquals($data['start_date'], $event->start_date->format('Y-m-d\TH:i:s.u\Z'));
        $this->assertEquals($data['end_date'], $event?->end_date?->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_render_edit_event_page(): void
    {
        /** @var \App\Models\Event $event */
        $event = Event::factory()->create();

        $response = $this->actingAs($this->admin())
            ->get(route('event.edit', $event));

        $response->assertOk();
        $response->assertViewIs('event.create-or-edit');
        $response->assertViewHas('event');
    }

    /** @test */
    public function it_can_process_to_update_event(): void
    {
        $this->assertActionUsesFormRequest(
            EventController::class,
            'update',
            EventUpdateRequest::class
        );

        /** @var \App\Models\Event $event */
        $event = Event::factory()->create();

        $data = Event::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->put(route('event.update', $event), $data);

        $event->refresh();

        $response->assertRedirect(route('event.index'));

        $this->assertEquals($data['name'], $event->name);
        $this->assertEquals($data['organizer_name'], $event->organizer_name);
        $this->assertEquals($data['type'], $event->type->value);
        $this->assertEquals($data['external_url'], $event->external_url);
        $this->assertEquals($data['start_date'], $event->start_date?->format('Y-m-d\TH:i:s.u\Z'));
        $this->assertEquals($data['end_date'], $event->end_date?->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_process_to_delete_event(): void
    {
        /** @var \App\Models\Event $event */
        $event = Event::factory()->create();

        $response = $this->actingAs($this->admin())
            ->delete(route('event.destroy', $event));

        $response->assertRedirect(route('event.index'));

        $this->assertSoftDeleted($event);
    }
}
