<button {!! $attributes->class('btn btn-sm btn-primary')->merge(['type' => 'submit']) !!}>
    @empty($slot->toHtml())
        <i class="fas fa-save"></i>
        @lang('Save')
    @else
        {!! $slot !!}
    @endempty
</button>
