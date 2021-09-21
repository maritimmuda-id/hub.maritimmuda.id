<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html;

class UserController
{
    public function index(Request $request, Html\Builder $htmlBuilder): View | JsonResponse
    {
        Gate::authorize('viewAny', User::class);

        if ($request->ajax()) {
            $userTable = (new User())->getTable();

            return DataTables::eloquent(
                User::query()
                    ->select("{$userTable}.*")
                    ->with([
                        'province',
                        'firstExpertise',
                        'secondExpertise',
                    ])
            )
                ->addColumn('province_name', function (User $row) {
                    return $row->province?->name ?? '-';
                })
                ->addColumn('first_expertise_name', function (User $row) {
                    return $row->firstExpertise?->name ?? '-';
                })
                ->addColumn('second_expertise_name', function (User $row) {
                    return $row->secondExpertise?->name ?? '-';
                })
                ->addColumn('photo', function (User $row) {
                    return view('includes.datatable-image', ['link' => $row->photo_thumb_link]);
                })
                ->addColumn('identity_card', function (User $row) {
                    return view('includes.datatable-image', ['link' => $row->identity_card_link]);
                })
                ->addColumn('action', function (User $row) {
                    return view('includes.datatable-action', [
                        'canImpersonate' => Gate::check('impersonate', $row),
                        'impersonateLink' => route('impersonate', $row),
                        'canDelete' => Gate::check('delete', $row),
                        'deleteLink' => route('user.destroy', $row),
                    ]);
                })
                ->editColumn('email', function (User $row) {
                    return "<a href=\"mailto:{$row->email}\">{$row->email}</a>";
                })
                ->editColumn('created_at', function (User $row) {
                    return $row->created_at->format('d F Y H:i');
                })
                ->orderColumn('created_at', function ($query, $order) {
                    /** @var \Illuminate\Database\Query\Builder $query */
                    $query->orderBy('id', $order);
                })
                ->rawColumns(['email', 'photo', 'identity_card'], true)
                ->make();
        }

        $dataTable = $htmlBuilder->addIndex()
            ->setTableId('users-table')
            ->columns([
                ['data' => 'created_at', 'title' => trans('users.created-at-label'), 'searchable' => false],
                ['data' => 'name', 'title' => trans('users.name-label')],
                ['data' => 'email', 'title' => trans('users.email-label')],
                ['data' => 'province_name', 'name' => 'province.name', 'title' => trans('users.province-name-label')],
                ['data' => 'first_expertise_name', 'name' => 'firstExpertise.name', 'title' => trans('users.first-expertise-name-label')],
                ['data' => 'second_expertise_name', 'name' => 'secondExpertise.name', 'title' => trans('users.second-expertise-name-label')],
                ['data' => 'photo', 'title' => trans('users.photo-label'), 'orderable' => false, 'searchable' => false],
                ['data' => 'identity_card', 'title' => trans('users.identity-card-label'), 'orderable' => false, 'searchable' => false],
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(route('user.index'))
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('user.index', compact('dataTable'));
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('delete', $user);

        $user->delete();

        toast(__(':resource deleted', ['resource' => trans('users.singular-name')]), 'success');

        return redirect()->route('user.index');
    }
}
