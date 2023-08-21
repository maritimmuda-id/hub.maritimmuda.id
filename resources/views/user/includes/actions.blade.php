@if(Gate::check('impersonate', $user))
    <a class="btn btn-sm btn-warning" style="margin:1.25px 0;" href="{{ route('impersonate', $user) }}">
        <i class="fas fa-user-secret"></i> {{ __('Impersonate') }}
    </a>
@endif

@include('includes.datatable-action')
