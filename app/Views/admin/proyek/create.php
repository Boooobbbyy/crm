<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Proyek/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Produk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                        <div class="invalid-feedback errorLokasi">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Batch</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Batch" name="Batch">
                        <div class="invalid-feedback errorBatch">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Kode" name="Kode">
                        <div class="invalid-feedback errorKode">

                        </div>
                    </div>
                </div>


                <div class="col-sm-8">
                    <input type="datetime" class="form-control" id="tgl_mulai" name="tgl_mulai" value="0" hidden>
                    <div class="invalid-feedback errorTgl_mulai">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Komposisi</label>
                    <div class="col-sm-8">
                        <textarea rows="3" type="text" id="tgl_selesai" name="tgl_selesai" class="form-control"></textarea>

                        <div class="invalid-feedback errorTgl_selesai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Produk</label>
                    <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" id="status" name="status">
                            <option value="dalam proses">dalam proses</option>
                            <option value="selesai">selesai</option>
                            <option value="dibatalkan">dibatalkan</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Quality</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="progress" name="progress">
                        <div class="invalid-feedback errorProgress">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Biaya Produk</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="dana" name="dana">
                        <div class="invalid-feedback errorDana">

                        </div>
                    </div>
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formtambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (response.error.lokasi) {
                            $('#lokasi').addClass('is-invalid');
                            $('.errorLokasi').html(response.error.lokasi);
                        } else {
                            $('#lokasi').removeClass('is-invalid');
                            $('.errorLokasi').html('');
                        }
                        if (response.error.tgl_mulai) {
                            $('#tgl_mulai').addClass('is-invalid');
                            $('.errorTgl_mulai').html(response.error.tgl_mulai);
                        } else {
                            $('#tgl_mulai').removeClass('is-invalid');
                            $('.errorTgl_mulai').html('');
                        }
                        if (response.error.tgl_selesai) {
                            $('#tgl_selesai').addClass('is-invalid');
                            $('.errorTgl_selesai').html(response.error.tgl_selesai);
                        } else {
                            $('#tgl_selesai').removeClass('is-invalid');
                            $('.errorTgl_selesai').html('');
                        }
                        if (response.error.status) {
                            $('#status').addClass('is-invalid');
                            $('.errorStatus').html(response.error.status);
                        } else {
                            $('#status').removeClass('is-invalid');
                            $('.errorStatus').html('');
                        }
                        if (response.error.progress) {
                            $('#progress').addClass('is-invalid');
                            $('.errorProgress').html(response.error.progress);
                        } else {
                            $('#progress').removeClass('is-invalid');
                            $('.errorProgress').html('');
                        }
                        if (response.error.dana) {
                            $('#dana').addClass('is-invalid');
                            $('.errorDana').html(response.error.dana);
                        } else {
                            $('#dana').removeClass('is-invalid');
                            $('.errorDana').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: response.sukses,
                        });

                        $('#modaltambah').modal('hide');
                        dataproyek();
                    }
                }
            });
        });
    });
</script>