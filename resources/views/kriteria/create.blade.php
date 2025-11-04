<div class="modal-dialog modal-lg w-50" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form id="form-kriteria" action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Kriteria</label>
                    <input type="text" name="kode_kriteria" class="form-control">
                    <small id="error-kode_kriteria" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control">
                    <small id="error-nama_kriteria" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="number" name="bobot_kriteria" step="0.01" class="form-control">
                    <small id="error-bobot_kriteria" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Tipe Kriteria</label>
                    <select name="tipe_kriteria" class="form-control">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                    <small id="error-tipe_kriteria" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                    <small id="error-deskripsi" class="form-text text-danger"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function simpanFormKriteria(form) {
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
                if (response.status) {
                    $('#myModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message
                    });
                    tableKriteria.ajax.reload(); // reload tabel utama
                } else {
                    $('.error-text').text('');
                    $.each(response.msgField, function(prefix, val) {
                        $('#error-' + prefix).text(val[0]);
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: Object.values(response.msgField)[0][0]
                    });
                }
            }
        });
    }
    $(function() {
        let sumBobot = '{{$sumBobot}}';
        console.log('lah piye',sumBobot);
        
        $('#form-kriteria').validate({
            rules: {
                kode_kriteria: {
                    required: true,
                    maxlength: 10
                },
                nama_kriteria: {
                    required: true,
                    maxlength: 100
                },
                bobot_kriteria: {
                    required: true,
                    number: true
                },
                tipe_kriteria: {
                    required: true
                }
            },
            messages: {
                kode_kriteria: {
                    required: 'Kode kriteria harus diisi',
                    maxlength: 'Kode kriteria maksimal 10 karakter'
                },
                nama_kriteria: {
                    required: 'Nama kriteria harus diisi',
                    maxlength: 'Nama kriteria maksimal 100 karakter'
                },
                bobot_kriteria: {
                    required: 'Bobot kriteria harus diisi',
                    number: 'Bobot kriteria harus angka'
                },
                tipe_kriteria: {
                    required: 'Tipe kriteria harus diisi'
                }
            },
            submitHandler: function(form) {
                let bobotBaru = parseFloat($('[name="bobot_kriteria"]').val());

                let totalBobot = parseFloat(sumBobot) + bobotBaru;
                totalBobot = parseFloat(totalBobot.toFixed(2));

                if (totalBobot !== 1.00) {
                    Swal.fire({
                        title: 'Total Bobot Tidak Sama Dengan 1.00',
                        html: `Total bobot setelah penambahan data adalah <strong>${totalBobot}</strong>. Tetap lanjutkan penyimpanan?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            simpanFormKriteria(form);
                        }
                    });
                } else {
                    simpanFormKriteria(form);
                }
                // $.get("{{ route('kriteria.cekBobot') }}", function(response) {});

                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
