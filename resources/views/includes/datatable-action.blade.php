@if(($canView ?? true) && isset($showLink))
    <a class="btn btn-sm btn-primary" style="margin:1.25px 0;" href="{{ $showLink }}">
        <i class="fas fa-eye"></i> {{ __('View') }}
    </a>
@endif
@if(($canEdit ?? true) && isset($editLink))
    <a class="btn btn-sm btn-info" style="margin:1.25px 0;" href="{{ $editLink }}">
        <i class="fas fa-edit"></i> {{ __('Edit') }}
    </a>
@endif
@if(($canDelete ?? true) && isset($deleteLink))
    <x-form :action="$deleteLink" method="delete" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
        <button type="submit" class="btn btn-sm btn-danger" style="margin:1.25px 0;">
            <i class="fas fa-trash"></i> {{ __('Delete') }}
        </button>
    </x-form>
@endif
