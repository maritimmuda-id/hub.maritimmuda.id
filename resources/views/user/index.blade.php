{{-- @dd($monthlyCounts) --}}
@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('users.plural-administration')
            </h4>
        </divcol-6>

        <div class="col-md-6 d-flex"> <!-- Use col-6 to take up half of the width -->
            <canvas id="myChart" height="200" style="padding: 10px;"></canvas> <!-- Adjust height as needed -->
            <canvas id="myChart2" height="200" style="padding: 10px;"></canvas> <!-- Adjust height as needed -->
        </div>

        <div class="col-12">
            <!-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-8ab823bc-6cde-4045-83bb-f9ca87c046f0" data-elfsight-app-lazy></div> -->
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Line chart
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
                            borderColor: 'rgb(0, 255, 0)' // Adjust the color for the second line
                        }]

                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: "{{ trans('users.x-axis-label') }}" // Y-axis title
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: "{{ trans('users.y-axis-label') }}" // Y-axis title
                                },
                                ticks: {
                                    precision: 0 // Set precision to 0 to display integers without decimals
                                }
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

                // Pie chart
                const pieChart = document.getElementById('myChart2');
                const ctx2 = pieChart.getContext('2d');
                const myPieChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($user_count) !!},
                        datasets: [{
                            label: "{{ trans('users.verify-chart-verify') }}",
                            data: {!! json_encode($userCountsVerify) !!}, // Adjusted data point for the second line
                            backgroundColor: 'rgb(0, 255, 0)' // Adjust the color for the second line
                        },
                        {
                            label: "{{ trans('users.notkta-chart-verify') }}",
                            data: {!! json_encode($userCountsCreated) !!}, // Adjusted data point for the second line
                            backgroundColor: 'rgb(0, 0, 255)' // Adjust the color for the second line
                        },
                        {
                            label: "{{ trans('users.notemail-chart-verify') }}",
                            data: {!! json_encode($userCountsNotMail) !!}, // Adjusted data point for the second line
                            backgroundColor: 'rgb(255, 0, 0)' // Adjust the color for the second line
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: "{{ trans('users.y-axis-label') }}" // Y-axis title
                                },
                                ticks: {
                                    precision: 0 // Set precision to 0 to display integers without decimals
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: "{{ trans('users.user-chart-verify') }}"
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
