<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostStoreRequest;
use App\Http\Requests\JobPostUpdateRequest;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class JobPostController
{
    public function index(Request $request, Builder $builder): View | JsonResponse
    {
        Gate::authorize('viewAny', JobPost::class);

        if ($request->ajax()) {
            return DataTables::eloquent(JobPost::query())
                ->addColumn('poster', function (JobPost $row) {
                    return view('includes.datatable-image', ['link' => $row->poster_thumb_link]);
                })
                ->addColumn('action', function (JobPost $row) {
                    return view('includes.datatable-action', [
                        'canView' => Gate::check('view', $row),
                        'showLink' => route('job-post.show', $row),
                        'canEdit' => Gate::check('update', $row),
                        'editLink' => route('job-post.edit', $row),
                        'canDelete' => Gate::check('delete', $row),
                        'deleteLink' => route('job-post.destroy', $row),
                    ]);
                })
                ->editColumn('type', function (JobPost $row) {
                    return $row->type->description;
                })
                ->editColumn('application_closed_at', function (JobPost $row) {
                    return $row->application_closed_at->format('d F Y H:i');
                })
                ->orderColumn('created_at', function ($query, $order) {
                    /** @var \Illuminate\Database\Query\Builder $query */
                    $query->orderBy('id', $order);
                })
                ->rawColumns(['poster'], true)
                ->make();
        }

        $dataTable = $builder->addIndex()
            ->columns([
                ['data' => 'position_title', 'name' => 'position_title', 'title' => trans('job-posts.position-title-label'), 'attributes' => ['data-priority' => 1]],
                ['data' => 'company_name', 'name' => 'company_name', 'title' => trans('job-posts.company-name-label'), 'attributes' => ['data-priority' => 2]],
                ['data' => 'type', 'name' => 'type', 'title' => trans('job-posts.type-label'), 'attributes' => ['data-priority' => 3]],
                ['data' => 'application_closed_at', 'name' => 'application_closed_at', 'title' => trans('job-posts.application-closed-at-label'), 'orderable' => false, 'searchable' => false, 'attributes' => ['data-priority' => 4]],
                ['data' => 'poster', 'name' => 'poster', 'title' => trans('job-posts.poster-label'), 'searchable' => false, 'orderable' => false, 'printable' => false, 'exportable' => false],
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(route('job-post.index'))
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('job-post.index', compact('dataTable'));
    }

    public function create(): View
    {
        Gate::authorize('create', JobPost::class);

        $isOnCreateState = true;
        $action = route('job-post.store');
        $jobPost = new JobPost();

        return view('job-post.create-or-edit', compact('isOnCreateState', 'action', 'jobPost'));
    }

    public function store(JobPostStoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', JobPost::class);

        $jobPost = JobPost::query()->create(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $jobPost->addMediaFromRequest('poster')
                ->toMediaCollection('poster');
        }

        $this->sendBroadcast($jobPost);

        toast(__(':resource created', ['resource' => trans('events.singular-name')]), 'success');

        return redirect()->route('job-post.index');
    }

    public function show(JobPost $jobPost): RedirectResponse
    {
        Gate::authorize('view', $jobPost);

        return redirect($jobPost->link);
    }

    public function edit(JobPost $jobPost): View
    {
        Gate::authorize('update', $jobPost);

        $isOnCreateState = false;
        $action = route('event.update', $jobPost);
        $method = 'patch';

        return view('job-post.create-or-edit', compact('isOnCreateState', 'action', 'method', 'jobPost'));
    }

    public function update(JobPostUpdateRequest $request, JobPost $jobPost): RedirectResponse
    {
        Gate::authorize('update', $jobPost);

        $jobPost->update(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $jobPost->addMediaFromRequest('poster')
                ->toMediaCollection('poster');
        }

        $this->sendBroadcast($jobPost);

        toast(__(':resource updated', ['resource' => trans('events.singular-name')]), 'success');

        return redirect()->route('job-post.index');
    }

    public function destroy(JobPost $jobPost): RedirectResponse
    {
        Gate::authorize('delete', $jobPost);

        $jobPost->delete();

        toast(__(':resource deleted', ['resource' => trans('job-posts.singular-name')]), 'success');

        return redirect()->route('job-post.index');
    }

    public function sendBroadcast(JobPost $jobPost)
    {
        $emails = User::pluck('email')->toArray();
        $subject = 'New Job Post Created: ' . $jobPost->position_title;
        $imagePath = $jobPost->poster;
        $message = 'A new job has been added. Click the link below :' . PHP_EOL . $jobPost->link . PHP_EOL . "to view this job post";

        Mail::raw($message, function ($mail) use ($emails, $subject, $imagePath) {
            $mail->to($emails)->subject("[BROADCAST] " . $subject);
            if ($imagePath !== null) {
                $attachmentPath = storage_path('app/public/' . $imagePath);
                $mail->attach($attachmentPath);
            }
        });
    }
}
