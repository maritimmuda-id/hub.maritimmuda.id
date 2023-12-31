<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Expertise;
use App\Models\Province;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
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

        $userStatusFilters = UserStatus::getInstances();

        $expertises = Expertise::query()
            ->pluck('name', 'id')
            ->toArray();

        $provinces = Province::query()
            ->pluck('name', 'id')
            ->toArray();

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
                ->filter(function (Builder $query) use ($request) {
                    $keyword = (string)$request->input('keyword');

                    if (! empty($keyword)) {
                        $query->where(function (Builder $query) use ($keyword) {
                            $query->where('name', 'like', "%{$keyword}%")
                                ->orWhere('email', 'like', "%{$keyword}%");
                        });
                    }

                    if (! empty($expertise = $request->input('expertise_id'))) {
                        $query->where(function (Builder $query) use ($expertise) {
                            $query->where('first_expertise_id', $expertise)
                                ->orWhere('second_expertise_id', $expertise);
                        });
                    }

                    if (! empty($province = $request->input('province_id'))) {
                        $query->whereRelation('province', 'id', $province);
                    }

                    $status = $request->input('status');

                    // User doesn't have any membership,
                    // this means that this one will be their first membership
                    if ($status == UserStatus::RequestIdentityCardVerification) {
                        $query->whereDoesntHave('memberships');
                        $query->whereRelation('media', 'collection_name', 'identity_card');
                    }

                    // TODO: Add query to filter by `request renewal` status
                })
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
                ->addColumn('action', function (User $row) {
                    return view('user.includes.actions', [
                        'canEdit' => Gate::check('update', $row),
                        'editLink' => route('user.edit', $row),
                        'canDelete' => Gate::check('delete', $row),
                        'deleteLink' => route('user.destroy', $row),
                        'user' => $row,
                    ]);
                })
                ->editColumn('email', function (User $row) {
                    return "<a href=\"mailto:{$row->email}\">{$row->email}</a>";
                })
                ->editColumn('created_at', function (User $row) {
                    return $row->created_at->format('d F Y');
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
            ])
            ->addAction(['title' => __('Action')])
            ->minifiedAjax(
                route('user.index'),
                <<<JAVASCRIPT
                    data.status = $('[name=status]').val();
                    data.keyword = $('[name=search]').val();
                    data.expertise_id = $('[name=expertise_id]').val();
                    data.province_id = $('[name=province_id]').val();
                JAVASCRIPT
            )
            ->searching(false)
            ->lengthChange(false)
            ->drawCallback(<<<JAVASCRIPT
                function(){window.lgThumb();}
            JAVASCRIPT);

        return view('user.index', compact('dataTable', 'provinces', 'expertises', 'userStatusFilters'));
    }

    public function edit(User $user): View
    {
        Gate::authorize('update', $user);

        $user->load('memberships');
        $provinces = Province::query()->pluck('name', 'id')->toArray();

        return view('user.edit', compact('user', 'provinces'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->validated())
            ->save();

        toast(__(':resource updated', ['resource' => trans('users.singular-name')]), 'success');

        return back();
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('delete', $user);

        $user->delete();

        toast(__(':resource deleted', ['resource' => trans('users.singular-name')]), 'success');

        return redirect()->route('user.index');
    }
}
