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
            $table = DataTables::eloquent(Scholarship::query());

            $table->addIndexColumn();

            $table->addColumn('poster', function (Scholarship $row) {
                return view('includes.datatable-image', ['link' => $row->poster_thumb_link]);
            }, false);

            $table->editColumn('submission_deadline', fn (Scholarship $row) => $row->submission_deadline->format('d F Y H:i'));

            $table->rawColumns(['poster'], true);

            $table->addColumn('action', function (Scholarship $row) {
                return view('includes.datatable-action', [
                    'canView' => Gate::check('view', $row),
                    'showLink' => $row->registration_link,
                    'canEdit' => Gate::check('update', $row),
                    'editLink' => route('scholarship.edit', $row),
                    'canDelete' => Gate::check('delete', $row),
                    'deleteLink' => route('scholarship.destroy', $row),
                ]);
            });

            return $table->make(true);
        }

        $dataTable = $builder->addIndex()
            ->columns([
                ['data' => 'name', 'name' => 'name', 'title' => trans('scholarships.name-label')],
                ['data' => 'provider_name', 'name' => 'provider_name', 'title' => trans('scholarships.provider-name-label')],
                ['data' => 'submission_deadline', 'name' => 'submission_deadline', 'title' => trans('scholarships.submission-deadline-label'), 'searchable' => false],
                ['data' => 'poster', 'name' => 'poster', 'title' => trans('scholarships.poster-label'), 'searchable' => false, 'orderable' => false, 'printable' => false, 'exportable' => false],
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

        return redirect($scholarship->external_url);
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
