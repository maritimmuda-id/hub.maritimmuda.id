@props([
    'wireModifier' => '',
    'name' => '',
    'label' => null,
    'format' => 'YYYY-MM-DD'
])

@php
    $id = $attributes->get('id') ?: "auto_id_{$name}";
@endphp

@wire($wireModifier)
    <x-form-input
        :name="$name"
        :label="$label"
        :id="$id"
        onchange="this.dispatchEvent(new InputEvent('input'))"
    >
        @isset($help)
            <x-slot name="help">
                {!! $help !!}
            </x-slot>
        @endisset
    </x-form-input>
@endwire
@push('scripts')
    <script>
        $(function () {
            $("#{{ $id }}")
                .datetimepicker({
                    format: '{{ $format }}',
                    locale: 'en',
                    icons: {
                        up: "fas fa-chevron-up",
                        down: "fas fa-chevron-down",
                        previous: "fas fa-chevron-left",
                        next: "fas fa-chevron-right",
                    },
                })
                .on('dp.change', (e) => {
                    $(e.currentTarget)
                        .val(e.date?.format('{{ $format }}'))
                        .trigger('change');
                });
        });
    </script>
@endpush
