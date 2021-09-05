<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Toaster;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html;

class UserController
{
    public function index(Request $request, Html\Builder $htmlBuilder): View | JsonResponse
    {
        Gate::authorize('viewAny', User::class);

        if ($request->ajax()) {
            $userTable = (new User())->getTable();

            $table = DataTables::eloquent(
                User::query()
                    ->select("{$userTable}.*")
                    ->with([
                        'province',
                        'firstExpertise',
                        'secondExpertise',
                    ])
            );

            $table->editColumn('email', function (User $row) {
                return "<a href=\"mailto:{$row->email}\">{$row->email}</a>";
            });

            $table->addColumn('province_name', function (User $row) {
                return $row->province?->name ?? '-';
            });

            $table->addColumn('first_expertise_name', function (User $row) {
                return $row->firstExpertise?->name ?? '-';
            });

            $table->addColumn('second_expertise_name', function (User $row) {
                return $row->secondExpertise?->name ?? '-';
            });

            $table->addIndexColumn();

            $table->rawColumns(['email'], true);

            $table->addColumn('action', function (User $row) {
                return view('includes.datatable-action', [
                    'canImpersonate' => Gate::check('impersonate', $row),
                    'impersonateLink' => route('impersonate', $row),
                    'canDelete' => Gate::check('delete', $row),
                    'deleteLink' => route('user.destroy', $row),
                ]);
            });

            return $table->make(true);
        }

        $dataTable = $htmlBuilder->addIndex()
            ->setTableId('users-table')
            ->columns([
                ['data' => 'id', 'title' => __('ID'), 'searchable' => false],
                ['data' => 'name', 'title' => __('users.name-label')],
                ['data' => 'email', 'title' => __('users.email-label')],
                ['data' => 'province_name', 'name' => 'province.name', 'title' => __('users.province-name-label')],
                ['data' => 'first_expertise_name', 'name' => 'firstExpertise.name', 'title' => __('users.first-expertise-name-label')],
                ['data' => 'second_expertise_name', 'name' => 'secondExpertise.name', 'title' => __('users.second-expertise-name-label')],
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(route('user.index'))
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('user.index', compact('dataTable'));
    }

    public function show(User $user): RedirectResponse
    {
        Gate::authorize('view', $user);

        return redirect($user->external_url);
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('delete', $user);

        $user->delete();

        toast(__(':resource deleted', ['resource' => trans('users.singular-name')]), 'success');

        return redirect()->route('user.index');
    }
}
