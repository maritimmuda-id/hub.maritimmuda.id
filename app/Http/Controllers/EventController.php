<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Toaster;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html;

class EventController
{
    public function index(Request $request, Html\Builder $htmlBuilder): View | JsonResponse
    {
        Gate::authorize('viewAny', Event::class);

        if ($request->ajax()) {
            $table = DataTables::eloquent(Event::query());

            $table->addIndexColumn();

            $table->addColumn('poster', function (Event $row) {
                return view('includes.datatable-image', ['link' => $row->poster_thumb_link]);
            }, false);

            $table->editColumn('type', fn (Event $row) => $row->type->description);
            $table->editColumn('start_date', fn (Event $row) => $row->start_date->format('d F Y H:i'));
            $table->editColumn('end_date', fn (Event $row) => $row->end_date?->format('d F Y H:i') ?? '-');

            $table->rawColumns(['poster'], true);

            $table->addColumn('action', function (Event $row) {
                return view('includes.datatable-action', [
                    'canView' => Gate::check('view', $row),
                    'showLink' => $row->external_url,
                    'canEdit' => Gate::check('update', $row),
                    'editLink' => route('event.edit', $row),
                    'canDelete' => Gate::check('delete', $row),
                    'deleteLink' => route('event.destroy', $row),
                ]);
            });

            return $table->make(true);
        }

        $dataTable = $htmlBuilder->addIndex()
            ->setTableId('events-table')
            ->columns([
                ['data' => 'id', 'name' => 'id', 'title' => __('ID'), 'searchable' => false],
                ['data' => 'name', 'name' => 'name', 'title' => __('events.name-label')],
                ['data' => 'organizer_name', 'name' => 'organizer_name', 'title' => __('events.organizer-name-label')],
                ['data' => 'type', 'name' => 'type', 'title' => __('events.type-label'), 'searchable' => false],
                ['data' => 'start_date', 'name' => 'start_date', 'title' => __('events.start-date-label'), 'searchable' => false, 'orderable' => false],
                ['data' => 'end_date', 'name' => 'end_date', 'title' => __('events.end-date-label'), 'searchable' => false, 'orderable' => false],
                ['data' => 'poster', 'name' => 'poster', 'title' => __('events.poster-label'), 'searchable' => false, 'orderable' => false, 'printable' => false, 'exportable' => false],
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(route('event.index'))
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('event.index', compact('dataTable'));
    }

    public function create(): View
    {
        Gate::authorize('create', Event::class);

        $isOnCreateState = true;
        $action = route('event.store');
        $event = new Event();

        return view('event.create-or-edit', compact('isOnCreateState', 'action', 'event'));
    }

    public function store(EventStoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', Event::class);

        $event = Event::query()->create(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $event->addMediaFromRequest('poster')
                ->toMediaCollection('poster');
        }

        toast(__(':resource created', ['resource' => trans('events.singular-name')]), 'success');

        return redirect()->route('event.index');
    }

    public function show(Event $event): RedirectResponse
    {
        Gate::authorize('view', $event);

        return redirect($event->external_url);
    }

    public function edit(Event $event): View
    {
        Gate::authorize('update', $event);

        $isOnCreateState = false;
        $action = route('event.update', $event);
        $method = 'patch';

        return view('event.create-or-edit', compact('isOnCreateState', 'action', 'method', 'event'));
    }

    public function update(EventUpdateRequest $request, Event $event): RedirectResponse
    {
        Gate::authorize('update', $event);

        $event->update(
            collect($request->validated())
                ->except('poster')
                ->toArray()
        );

        if ($request->hasFile('poster')) {
            $event->addMediaFromRequest('poster')
                ->toMediaCollection('poster');
        }

        toast(__(':resource updated', ['resource' => trans('events.singular-name')]), 'success');

        return redirect()->route('event.index');
    }

    public function destroy(Event $event): RedirectResponse
    {
        Gate::authorize('delete', $event);

        $event->delete();

        toast(__(':resource deleted', ['resource' => trans('events.singular-name')]), 'success');

        return redirect()->route('event.index');
    }
}
