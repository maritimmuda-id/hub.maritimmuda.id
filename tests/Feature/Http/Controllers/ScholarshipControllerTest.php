<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\ScholarshipController;
use App\Http\Requests\ScholarshipStoreRequest;
use App\Http\Requests\ScholarshipUpdateRequest;
use App\Models\Scholarship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ScholarshipController
 */
class ScholarshipControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;

    /** @test */
    public function it_can_render_lists_scholarship_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('scholarship.index'));

        $response->assertOk();
        $response->assertSeeText(trans('scholarships.plural-name'));
        $response->assertViewIs('scholarship.index');
    }

    /** @test */
    public function it_can_process_datatable_scholarship_ajax(): void
    {
        $this->assertHasDatatable(route('scholarship.index'));
    }

    /** @test */
    public function it_can_render_create_scholarship_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('scholarship.create'));

        $response->assertOk();
        $response->assertViewIs('scholarship.create-or-edit');
        $response->assertViewHas('isOnCreateState', true);
    }

    /** @test */
    public function it_can_process_to_store_scholarship(): void
    {
        $this->assertActionUsesFormRequest(
            ScholarshipController::class,
            'store',
            ScholarshipStoreRequest::class
        );

        $this->assertEquals(0, Scholarship::query()->count());

        $data = Scholarship::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->post(route('scholarship.store'), $data);

        $response->assertSessionHasNoErrors();

        $response->assertRedirect(route('scholarship.index'));

        $this->assertEquals(1, Scholarship::query()->count());

        /** @var \App\Models\Scholarship $scholarship */
        $scholarship = Scholarship::first();
        $this->assertEquals($data['name'], $scholarship->name);
        $this->assertEquals($data['provider_name'], $scholarship->provider_name);
        $this->assertEquals($data['registration_link'], $scholarship->registration_link);
        $this->assertEquals($data['submission_deadline'], $scholarship->submission_deadline->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_render_edit_scholarship_page(): void
    {
        /** @var \App\Models\Scholarship $scholarship */
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($this->admin())
            ->get(route('scholarship.edit', $scholarship));

        $response->assertOk();
        $response->assertViewIs('scholarship.create-or-edit');
        $response->assertViewHas('scholarship');
    }

    /** @test */
    public function it_can_process_to_update_scholarship(): void
    {
        $this->assertActionUsesFormRequest(
            ScholarshipController::class,
            'update',
            ScholarshipUpdateRequest::class
        );

        /** @var \App\Models\Scholarship $scholarship */
        $scholarship = Scholarship::factory()->create();

        $data = Scholarship::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->put(route('scholarship.update', $scholarship), $data);

        $scholarship->refresh();

        $response->assertRedirect(route('scholarship.index'));

        $this->assertEquals($data['name'], $scholarship->name);
        $this->assertEquals($data['provider_name'], $scholarship->provider_name);
        $this->assertEquals($data['registration_link'], $scholarship->registration_link);
        $this->assertEquals($data['submission_deadline'], $scholarship->submission_deadline?->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_process_to_delete_scholarship(): void
    {
        /** @var \App\Models\Scholarship $scholarship */
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($this->admin())
            ->delete(route('scholarship.destroy', $scholarship));

        $response->assertRedirect(route('scholarship.index'));

        $this->assertSoftDeleted($scholarship);
    }
}
