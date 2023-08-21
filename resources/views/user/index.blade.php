@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('users.plural-name')
            </h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <x-form-input
                        name="search"
                        class="form-control-sm"
                        :placeholder="__('Search')"
                        :label="__('Search')"
                    />
                </div>
                <div class="col-md-2">
                    <x-form-select
                        name="status"
                        class="form-control-sm"
                        :label="__('Filter by status')"
                    >
                        <option value="">All status</option>
                        @foreach ($userStatusFilters as $userStatusFilter)
                            <option value="{{ $userStatusFilter->value }}">
                                {{ $userStatusFilter->description }}
                            </option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="col-md-2">
                    <x-form-select
                        name="province_id"
                        class="form-control-sm"
                        :label="__('Filter by province')"
                    >
                        <option value="">All province</option>
                        @foreach ($provinces as $provinceId => $provinceName)
                            <option value="{{ $provinceId }}">
                                {{ $provinceName }}
                            </option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="col-md-2">
                    <x-form-select
                        name="expertise_id"
                        class="form-control-sm"
                        :label="__('Filter by expertise')"
                    >
                        <option value="">All expertise</option>
                        @foreach ($expertises as $expertiseId => $expertiseName)
                            <option value="{{ $expertiseId }}">
                                {{ $expertiseName }}
                            </option>
                        @endforeach
                    </x-form-select>
                </div>
            </div>
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}

    <script>
        function refreshDatatable () {
            window.{{ config('datatables-html.namespace') }}["users-table"].draw();
        }

        $(function () {
            var throttled;
            $("[name=search]").on('keyup change paste cut', function (e) {
                if (throttled) {
                    clearTimeout(throttled);
                }

                throttled = setTimeout(() => {
                    console.log(e.type);
                    refreshDatatable();
                }, 1000);
            })

            $("[name=status], [name=province_id], [name=expertise_id]").on('change', function (e) {
                refreshDatatable();
            });
        });
    </script>
@endpush
