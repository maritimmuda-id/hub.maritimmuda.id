@if(auth()->user()->is_admin == 2 || auth()->user()->is_admin == 3)
    @if($user->is_admin == 0 || $user->is_admin == 1)
        <x-form :action="route('user.make-developer', $user)" method="post" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
            <button type="submit" class="btn btn-sm btn-dark" style="margin:1.25px 0;">
                <i class="fas fa-code"></i> {{ __('Developer') }}
            </button>
        </x-form>
    @endif
    @if($user->is_admin == 2 && $user->uuid != auth()->user()->uuid)
        <x-form :action="route('user.make-deldeveloper', $user)" method="post" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
            <button type="submit" class="btn btn-sm btn-dark" style="margin:1.25px 0;">
                <i class="fas fa-code"></i> {{ __('DelDeveloper') }}
            </button>
        </x-form>
    @endif
@endif
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
@if(Gate::check('impersonate', $user) || (Auth::user() && Auth::user()->is_admin == 3))
    <a class="btn btn-sm btn-warning" style="margin:1.25px 0;" href="{{ route('impersonate', $user) }}">
        <i class="fas fa-user-secret"></i> {{ __('Impersonate') }}
    </a>
@endif

@include('includes.datatable-action')
