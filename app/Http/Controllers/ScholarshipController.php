<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipStoreRequest;
use App\Http\Requests\ScholarshipUpdateRequest;
use App\Models\Scholarship;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ScholarshipController
{
    public function index(Request $request, Builder $builder): View | JsonResponse
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Scholarship::query())
                ->addColumn('poster', function (Scholarship $row) {
                    return view('includes.datatable-image', ['link' => $row->poster_thumb_link]);
                })
                ->addColumn('action', function (Scholarship $row) {
                    return view('includes.datatable-action', [
                        'canView' => Gate::check('view', $row),
                        'showLink' => route('scholarship.show', $row),
                        'canEdit' => Gate::check('update', $row),
                        'editLink' => route('scholarship.edit', $row),
                        'canDelete' => Gate::check('delete', $row),
                        'deleteLink' => route('scholarship.destroy', $row),
                    ]);
                })
                ->editColumn('created_at', function (Scholarship $row) {
                    return $row->created_at->format('d F Y H:i');
                })
                ->editColumn('submission_deadline', function (Scholarship $row) {
                    return $row->submission_deadline->format('d F Y H:i');
                })
                ->orderColumn('created_at', function ($query, $order) {
                    /** @var \Illuminate\Database\Query\Builder $query */
                    $query->orderBy('id', $order);
                })
                ->rawColumns(['poster'], true)
                ->make();
        }

        $dataTable = $builder->orderBy(0)
            ->columns([
                ['data' => 'created_at', 'title' => __('Posting Date'), 'searchable' => false],
                ['data' => 'name', 'title' => trans('scholarships.name-label')],
                ['data' => 'provider_name', 'title' => trans('scholarships.provider-name-label')],
                ['data' => 'submission_deadline', 'title' => trans('scholarships.submission-deadline-label'), 'searchable' => false],
                ['data' => 'poster', 'title' => trans('scholarships.poster-label'), 'searchable' => false, 'orderable' => false, 'printable' => false, 'exportable' => false],
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(route('scholarship.index'))
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('scholarship.index', compact('dataTable'));
    }

    public function create(): View
    {
        Gate::authorize('create', Scholarship::class);

        $isOnCreateState = true;
        $action = route('scholarship.store');
        $scholarship = new Scholarship();

        return view('scholarship.create-or-edit', compact('isOnCreateState', 'action', 'scholarship'));
    }

    public function store(ScholarshipStoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', Scholarship::class);

        $scholarship = Scholarship::query()->create(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $scholarship->addMediaFromRequest('poster')
            ->toMediaCollection('poster');
        }

        toast(__(':resource created', ['resource' => trans('scholarships.singular-name')]), 'success');

        return redirect()->route('scholarship.index');
    }

    public function show(Scholarship $scholarship): RedirectResponse
    {
        Gate::authorize('view', $scholarship);

        return redirect($scholarship->registration_link);
    }

    public function edit(Scholarship $scholarship): View
    {
        Gate::authorize('update', $scholarship);

        $isOnCreateState = false;
        $action = route('scholarship.update', $scholarship);
        $method = 'patch';

        return view('scholarship.create-or-edit', compact('isOnCreateState', 'action', 'method', 'scholarship'));
    }

    public function update(ScholarshipUpdateRequest $request, Scholarship $scholarship): RedirectResponse
    {
        Gate::authorize('update', $scholarship);

        $scholarship->update(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $scholarship->addMediaFromRequest('poster')
            ->toMediaCollection('poster');
        }

        toast(__(':resource updated', ['resource' => trans('scholarships.singular-name')]), 'success');

        return redirect()->route('scholarship.index');
    }

    public function destroy(Scholarship $scholarship): RedirectResponse
    {
        Gate::authorize('delete', $scholarship);

        $scholarship->delete();

        toast(__(':resource deleted', ['resource' => trans('scholarships.singular-name')]), 'success');

        return redirect()->route('scholarship.index');
    }
}
