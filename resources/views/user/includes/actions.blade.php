@if($user->is_admin == 0)
    <x-form :action="route('user.make-admin', $user)" method="post" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
        <button type="submit" class="btn btn-sm btn-dark" style="margin:1.25px 0;">
            <i class="fas fa-key"></i> {{ __('Admin') }}
        </button>
    </x-form>
@endif
@if($user->is_admin == 1 && $user->uuid != auth()->user()->uuid)
    <x-form :action="route('user.make-deladmin', $user)" method="post" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
        <button type="submit" class="btn btn-sm btn-dark" style="margin:1.25px 0;">
            <i class="fas fa-key"></i> {{ __('DelAdmin') }}
        </button>
    </x-form>
@endif
@if(Gate::check('impersonate', $user))
    <a class="btn btn-sm btn-warning" style="margin:1.25px 0;" href="{{ route('impersonate', $user) }}">
        <i class="fas fa-user-secret"></i> {{ __('Impersonate') }}
    </a>
@endif

@include('includes.datatable-action')
