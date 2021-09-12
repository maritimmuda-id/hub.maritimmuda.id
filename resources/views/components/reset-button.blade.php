<button type="reset" {!! $attributes->class('btn btn-sm btn-secondary')->merge(['type' => 'reset']) !!}>
    @empty($slot->toHtml())
        <i class="fas fa-times"></i>
        @lang('Cancel')
    @else
        {!! $slot !!}
    @endempty
</button>
