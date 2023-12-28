{{-- @dd($monthlyCounts) --}}
@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('users.plural-chart')
            </h4>
        </div>

        <div class="col-12"> <!-- Use col-6 to take up half of the width -->
            <canvas id="myChart" height="100"></canvas> <!-- Adjust height as needed -->
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lineChart = document.getElementById('myChart');
                const ctx = lineChart.getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($months) !!},
                        datasets: [{
                            label: "{{ trans('users.regis-chart') }}",
                            data: {!! json_encode($monthlyCountsCreated) !!}, // Adjusted data point
                            borderColor: 'rgb(50, 31, 219)' // Corrected property name
                        },
                        {
                            label: "{{ trans('users.verify-chart') }}",
                            data: {!! json_encode($monthlyCountsVerify) !!}, // Adjusted data point for the second line
                            borderColor: 'rgb(255, 0, 0)' // Adjust the color for the second line
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: "{{ trans('users.user-chart') }}"
                            }
                        }
                    }
                });
            });
        </script>
    </div>

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
