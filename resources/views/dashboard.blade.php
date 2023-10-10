{{-- @dd($monthlyCounts) --}}
@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($widgets as $widget)
                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-3 d-flex align-items-center">
                                <div class="bg-gradient-primary p-3 mfe-3">
                                    <i class="{{ $widget['icon'] }} c-icon c-icon-xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-primary">{{ $widget['value'] }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small">{{ $widget['label'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer px-3 py-2">
                                <a href="{{ $widget['action'] }}"
                                    class="btn-block text-muted d-flex justify-content-between align-items-center">
                                    <span class="small font-weight-bold">@lang('View More')</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12"> <!-- Use col-6 to take up half of the width -->
                    <canvas id="myChart" height="100"></canvas> <!-- Adjust height as needed -->
                </div>
            </div>
        </div>
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
                        label: 'User Count',
                        data: {!! json_encode($monthlyCounts) !!}, // Adjusted data point
                        borderColor: 'rgb(50, 31, 219)' // Corrected property name
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
                            text: 'Line Chart Users'
                        }
                    }
                }
            });
        });
    </script>
@endsection
