<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\JobPostController;
use App\Http\Requests\JobPostStoreRequest;
use App\Http\Requests\JobPostUpdateRequest;
use App\Models\JobPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\JobPostController
 */
class JobPostControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;

    /** @test */
    public function it_can_render_lists_job_post_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('job-post.index'));

        $response->assertOk();
        $response->assertSeeText(trans('job-posts.plural-name'));
        $response->assertViewIs('job-post.index');
    }

    /** @test */
    public function it_can_process_datatable_job_post_ajax(): void
    {
        $this->assertHasDatatable(route('job-post.index'));
    }

    /** @test */
    public function it_can_render_create_job_post_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('job-post.create'));

        $response->assertOk();
        $response->assertViewIs('job-post.create-or-edit');
        $response->assertViewHas('isOnCreateState', true);
    }

    /** @test */
    public function it_can_process_to_store_job_post(): void
    {
        $this->assertActionUsesFormRequest(
            JobPostController::class,
            'store',
            JobPostStoreRequest::class
        );

        $this->assertEquals(0, JobPost::query()->count());

        $data = JobPost::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->post(route('job-post.store'), $data);

        $response->assertSessionHasNoErrors();

        $response->assertRedirect(route('job-post.index'));

        $this->assertEquals(1, JobPost::query()->count());

        /** @var \App\Models\JobPost $jobPost */
        $jobPost = JobPost::first();
        $this->assertEquals($data['position_title'], $jobPost->position_title);
        $this->assertEquals($data['company_name'], $jobPost->company_name);
        $this->assertEquals($data['type'], $jobPost->type->value);
        $this->assertEquals($data['link'], $jobPost->link);
        $this->assertEquals($data['application_closed_at'], $jobPost->application_closed_at->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_render_edit_job_post_page(): void
    {
        /** @var \App\Models\JobPost $jobPost */
        $jobPost = JobPost::factory()->create();

        $response = $this->actingAs($this->admin())
            ->get(route('job-post.edit', $jobPost));

        $response->assertOk();
        $response->assertViewIs('job-post.create-or-edit');
        $response->assertViewHas('jobPost');
    }

    /** @test */
    public function it_can_process_to_update_job_post(): void
    {
        $this->assertActionUsesFormRequest(
            JobPostController::class,
            'update',
            JobPostUpdateRequest::class
        );

        /** @var \App\Models\JobPost $jobPost */
        $jobPost = JobPost::factory()->create();

        $data = JobPost::factory()->make()->toArray();

        $response = $this->actingAs($this->admin())
            ->put(route('job-post.update', $jobPost), $data);

        $jobPost->refresh();

        $response->assertRedirect(route('job-post.index'));

        $this->assertEquals($data['position_title'], $jobPost->position_title);
        $this->assertEquals($data['company_name'], $jobPost->company_name);
        $this->assertEquals($data['type'], $jobPost->type->value);
        $this->assertEquals($data['link'], $jobPost->link);
        $this->assertEquals($data['application_closed_at'], $jobPost->application_closed_at?->format('Y-m-d\TH:i:s.u\Z'));
    }

    /** @test */
    public function it_can_process_to_delete_job_post(): void
    {
        /** @var \App\Models\JobPost $jobPost */
        $jobPost = JobPost::factory()->create();

        $response = $this->actingAs($this->admin())
            ->delete(route('job-post.destroy', $jobPost));

        $response->assertRedirect(route('job-post.index'));

        $this->assertSoftDeleted($jobPost);
    }
}
