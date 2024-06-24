{{-- @dd($monthlyCounts) --}}
@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-users"></i> @lang('navigation.user')</b>
        </h1>
    </div>

    <div class="card p-3 m-4" style="border: none;">
        <h4 class="d-inline pb-3">
            <b>@lang('users.plural-chart')</b>
        </h4>

        <div class="row d-flex justify-content-between align-items-center pr-3 pl-3">
            <div class="card mb-0" style="flex: 0 0 50%; max-width: 49%;"> <!-- Use col-6 to take up half of the width -->
                <canvas id="myChart" height="250"></canvas> <!-- Adjust height as needed -->
            </div>

            <div class="card mb-0" style="flex: 0 0 50%; max-width: 49%;"> <!-- Use col-6 to take up half of the width -->
                <canvas id="myChart2" height="250"></canvas> <!-- Adjust height as needed -->
            </div>
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
                            borderColor: '#0c6c9d' // Corrected property name
                        },
                        {
                            label: "{{ trans('users.verify-chart') }}",
                            data: {!! json_encode($monthlyCountsVerify) !!}, // Adjusted data point for the second line
                            borderColor: '#14a9c3' // Adjust the color for the second line
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
                                text: "{{ trans('users.user-chart') }}",
                                font: {
                                    family: "'Poppins', sans-serif",
                                }
                            }
                        }
                    }
                });

                // Bar chart
                const barChart = document.getElementById('myChart2');
                const ctx2 = barChart.getContext('2d');
                const myBarChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($user_count) !!},
                        datasets: [{
                            label: "{{ trans('users.verify-chart-verify') }}",
                            data: {!! json_encode($userCountsVerify) !!}, // Adjusted data point for the second line
                            backgroundColor: '#14a9c3' // Adjust the color for the second line
                        },
                        {
                            label: "{{ trans('users.notkta-chart-verify') }}",
                            data: {!! json_encode($userCountsCreated) !!}, // Adjusted data point for the second line
                            backgroundColor: '#0c6c9d' // Adjust the color for the second line
                        },
                        {
                            label: "{{ trans('users.notemail-chart-verify') }}",
                            data: {!! json_encode($userCountsNotMail) !!}, // Adjusted data point for the second line
                            backgroundColor: '#d95353' // Adjust the color for the second line
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
                                text: "{{ trans('users.user-chart-verify') }}",
                                font: {
                                    family: "'Poppins', sans-serif",
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </div>

    <div class="card m-4" style="border: none;">
        <div class="card-header pt-4" style="border-bottom: none;">
            <h4 class="d-inline" id="plural-table-name">
                <b>@lang('users.plural-name')</b>
            </h4>
            <div class="card-header-actions ml-3">
                <button class="btn btn-sm btn-info" onclick="exportToXlsx()"><i class="fas fa-download"></i> <span class="d-none d-sm-inline-block">@lang('users.export-table')</span></button>
            </div>
            <div class="card-header-actions">
                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#broadcastModal"><i class="fas fa-paper-plane"></i> <span class="d-none d-sm-inline-block">@lang('users.broadcast')</span></button>
            </div>
            <div class="modal fade" id="broadcastModal" tabindex="-1" role="dialog" aria-labelledby="broadcastModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="border: none; border-radius: 15px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="broadcastModalLabel">{{ __('membership.heading-text-mail') }}</h5>
                        </div>
                        <div class="modal-body">
                            <form id="broadcastForm" action="{{ route('send.broadcast') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="allMail">{{ __('membership.e-mail') }}</label>
                                    <input class="form-control mb-3" id="allMail" name="email" rows="4" required readonly value="All"></input>
                                    <label for="subjectMessage">{{ __('membership.subject-text-mail') }}</label>
                                    <input class="form-control mb-3" id="subjectMessage" name="subject-message" rows="4" required></input>
                                    <label for="image">{{ __('membership.image') }}</label>
                                    <input type="file" name="image" id="image" class="form-control mb-3" accept="image/*">
                                    <label for="broadcastMessage">{{ __('membership.text-mail') }}</label>
                                    <textarea class="form-control" id="broadcastMessage" name="message" rows="4" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancelButton" class="btn btn-secondary" data-dismiss="modal">{{ __('membership.cancel-text-mail') }}</button>
                            <button type="submit" form="broadcastForm" id="sendButton" class="btn btn-primary">{{ __('membership.confirm-text-mail') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@^10"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Fungsi untuk menampilkan pesan sukses
                    function showSuccessMessage(email) {
                        Swal.fire({
                            title: 'Email berhasil terkirim!',
                            text: email,
                            timer: 5000,
                            showConfirmButton: false,
                            showCloseButton: true,
                            toast: true,
                            icon: 'success',
                            position: 'top-end'
                        });
                    }

                    // Handler untuk mengirim email
                    @if(session('email_sent'))
                        var userEmail = $('#allMail').val(); // Mengambil nilai email dari session
                        showSuccessMessage(userEmail);
                    @endif
                });

                // Menonaktifkan tombol setelah diklik
                function disableButtons() {
                    var sendButton = document.getElementById("sendButton");
                    var cancelButton = document.getElementById("cancelButton");

                    sendButton.disabled = true;
                    cancelButton.disabled = true;

                    sendButton.classList.add("disabled");
                    cancelButton.classList.add("disabled");
                }

                // Menonaktifkan tombol setelah form terkirim
                document.getElementById("broadcastForm").addEventListener("submit", function () {
                    disableButtons();
                });
            </script>
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
                <div class="col-md-2">
                    <x-form-input
                        type="date"
                        name="start_date"
                        class="form-control-sm"
                        :placeholder="__('Start Date')"
                        :label="__('Start date')"
                        :value="request('start_date')"
                    />
                </div>
                <div class="col-md-2">
                    <x-form-input
                        type="date"
                        name="end_date"
                        class="form-control-sm"
                        :placeholder="__('End Date')"
                        :label="__('End date')"
                        :value="request('end_date')"
                    />
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
            $("[name=search], [name=status], [name=province_id], [name=expertise_id], [name=start_date], [name=end_date]").on('keyup change paste cut', function (e) {
                if (throttled) {
                    clearTimeout(throttled);
                }

                throttled = setTimeout(() => {
                    console.log(e.type);
                    refreshDatatable();
                }, 1000);
            });
        });

        function refreshDatatable () {
            // Mendapatkan nilai input untuk filter
            const status = $('[name=status]').val();
            const keyword = $('[name=search]').val();
            const expertiseId = $('[name=expertise_id]').val();
            const provinceId = $('[name=province_id]').val();
            const startDate = $('[name=start_date]').val();
            const endDate = $('[name=end_date]').val();

            // Mengirim permintaan Ajax dengan data filter yang diperbarui
            window.{{ config('datatables-html.namespace') }}["users-table"].ajax.url('{{ route("user.index") }}?status=' + status + '&keyword=' + keyword + '&expertise_id=' + expertiseId + '&province_id=' + provinceId + '&start_date=' + startDate + '&end_date=' + endDate).load();
        }


        function exportToXlsx() {
            const table = document.getElementById("users-table");

            // Create a copy of the table without excluded columns
            const tableCopy = table.cloneNode(true);
            const excludedColumnIndices = getColumnIndicesToExclude(tableCopy);

            // Remove excluded columns
            removeColumns(tableCopy, excludedColumnIndices);

            // Convert the modified table to XLSX
            const ws = XLSX.utils.table_to_sheet(tableCopy);
            const wb = XLSX.utils.book_new();

            // Set a sheet name
            const rawSheetName = document.getElementById("users-table_info").innerHTML;
            const sheet_name = rawSheetName.substr(0, 31);
            XLSX.utils.book_append_sheet(wb, ws, sheet_name);

            // Save the file
            const info = $('#users-table_info').text();
            const entriesTable = info.split(' ')[3];
            const sheetName = {!! json_encode(__('users.plural-name')) !!};
            const filename = "[EXPORT] [" + entriesTable + "] " + sheetName + " - Maritim Muda Hub.xlsx";
            // Now use 'filename' in your XLSX.writeFile call
            XLSX.writeFile(wb, filename);
        }

        function getColumnIndicesToExclude(table) {
            const excludedColumns = ["Action", "Tindakan", "Payment", "Pembayaran", "Photo", "Foto"];
            const indices = [];

            // Find column indices to exclude
            const headerRow = table.querySelector("thead tr");
            Array.from(headerRow.children).forEach((th, index) => {
                if (excludedColumns.includes(th.textContent.trim())) {
                    indices.push(index);
                }
            });

            return indices;
        }

        function removeColumns(table, indices) {
            // Remove columns from the table
            Array.from(table.rows).forEach(row => {
                indices.sort((a, b) => b - a); // Sort in descending order to avoid index issues
                indices.forEach(index => row.deleteCell(index));
            });
        }
    </script>
@endpush
