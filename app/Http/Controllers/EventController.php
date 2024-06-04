<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html;

class EventController
{
    public function index(Request $request, Html\Builder $htmlBuilder): View | JsonResponse
    {
        Gate::authorize('viewAny', Event::class);

        if ($request->ajax()) {
            return DataTables::eloquent(Event::query())
                ->addColumn('poster', function (Event $row) {
                    return view('includes.datatable-image', ['link' => $row->poster_thumb_link]);
                })
                ->addColumn('action', function (Event $row) {
                    return view('includes.datatable-action', [
                        'canView' => Gate::check('view', $row),
                        'showLink' => route('event.show', $row),
                        'canEdit' => Gate::check('update', $row),
                        'editLink' => route('event.edit', $row),
                        'canDelete' => Gate::check('delete', $row),
                        'deleteLink' => route('event.destroy', $row),
                    ]);
                })
                ->editColumn('type', fn (Event $row) => $row->type->description)
                ->editColumn('start_date', function (Event $row) {
                    return $row->start_date->format('d F Y H:i');
                })
                ->editColumn('end_date', function (Event $row) {
                    return $row->end_date?->format('d F Y H:i') ?? '-';
                })
                ->editColumn('created_at', function (Event $row) {
                    return $row->created_at->format('d F Y H:i');
                })
                ->orderColumn('created_at', function ($query, $order) {
                    /** @var \Illuminate\Database\Query\Builder $query */
                    $query->orderBy('id', $order);
                })
                ->rawColumns(['poster'], true)
                ->make();
        }

        $dataTable = $htmlBuilder->addIndex()
            ->setTableId('events-table')
            ->columns([
                ['data' => 'created_at', 'title' => __('Posting Date'), 'searchable' => false],
                ['data' => 'name', 'title' => trans('events.name-label'), 'attributes' => ['data-priority' => 1]],
                ['data' => 'organizer_name', 'title' => trans('events.organizer-name-label'), 'attributes' => ['data-priority' => 2]],
                ['data' => 'type', 'title' => trans('events.type-label'), 'searchable' => false, 'attributes' => ['data-priority' => 3]],
                ['data' => 'start_date', 'title' => trans('events.start-date-label'), 'searchable' => false, 'orderable' => false, 'attributes' => ['data-priority' => 4]],
                ['data' => 'end_date', 'title' => trans('events.end-date-label'), 'searchable' => false, 'orderable' => false],
                ['data' => 'poster', 'title' => trans('events.poster-label'), 'searchable' => false, 'orderable' => false, 'printable' => false, 'exportable' => false],
            ])
            ->orderBy(0)
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

        $this->sendBroadcast($event);

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

        $this->sendBroadcast($event);

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

    public function sendBroadcast(Event $event) 
    {
        $emails = User::pluck('email')->toArray();
        $subject = 'New Event Created: ' . $event->name; 
        $imagePath = $event->poster;
        $message = 'A new event has been added. Click the link below :' . PHP_EOL . $event->external_url . PHP_EOL . "to join this event";

        Mail::raw($message, function ($mail) use ($emails, $subject, $imagePath) {
            $mail->to($emails)->subject("[BROADCAST] " . $subject);
            if ($imagePath !== null) {
                $attachmentPath = storage_path('app/public/' . $imagePath);
                $mail->attach($attachmentPath); 
            } else {
                $imagePath = null; 
            }
        });
    }
}
