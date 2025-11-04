@extends('layouts.main')

@section('content')
    <div class="w-100 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Header with title and Add button -->
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title my-5 w-25">Data Kriteria</h3>
                    <button class="btn btn-primary" onclick="modalAction('{{ route('kriteria.create') }}')">
                        <i class="fa fa-plus mr-1"></i>
                        Tambah Kriteria
                    </button>
                </div>
                <div class="alert alert-danger d-none" id="bobot-error">
                    Bobot tidak boleh lebih atau kurang dari 1.00, total bobot sekarang: <strong
                        id="total-bobot-text"></strong>
                </div>
                <!-- DataTable -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table-kriteria">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal placeholder for Create/Edit/Delete -->
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
        /**
         * Load a remote Blade partial into #myModal and show as Bootstrap modal
         */

        function cekTotalBobotDariTable() {
            let total = 0;

            // Loop semua data dalam kolom 'bobot_kriteria'
            tableKriteria.rows().every(function() {
                let data = this.data();
                let bobot = parseFloat(data.bobot_kriteria);
                if (!isNaN(bobot)) {
                    total += bobot;
                }
            });

            // Tampilkan peringatan jika tidak sama dengan 1.00
            if (total.toFixed(2) != 1.00) {
                $('#total-bobot-text').text(total.toFixed(2));
                $('#bobot-error').removeClass('d-none');
            } else {
                $('#bobot-error').addClass('d-none');
            }
        }

        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $(this).modal('show');
            });
        }
        let tableKriteria;
        $(document).ready(function() {
            tableKriteria = $('#table-kriteria').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('kriteria.list') }}",
                    "dataType": "json",
                    "type": "GET"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_kriteria',
                        name: 'kode_kriteria'
                    },
                    {
                        data: 'nama_kriteria',
                        name: 'nama_kriteria'
                    },
                    {
                        data: 'bobot_kriteria',
                        name: 'bobot_kriteria'
                    },
                    {
                        data: 'tipe_kriteria',
                        name: 'tipe_kriteria'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function(settings) {
                    cekTotalBobotDariTable();
                },
                error: function(xhr) {
                    // On unauthorized or forbidden, redirect to dashboard
                    if (xhr.status === 401 || xhr.status === 403) {
                        window.location.href = '{{ route('dashboard') }}';
                    }
                }
            });
        });
    </script>
@endpush
