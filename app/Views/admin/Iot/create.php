<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Iot/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">berat</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="berat" name="berat">
                        <div class="invalid-feedback errorBerat">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">tanggal</label>
                    <div class="col-sm-8">
                        <input type="datetime" class="form-control" id="tanggal" name="tanggal">
                        <div class="invalid-feedback errortanggal">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Produk</label>
                    <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" name="nama_prod">
                            <?php foreach ($iot as $j) : ?>
                                <option value="<?= $j['id_iot']; ?>"><?= $j['nama_prod']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
                        if (response.error.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(response.error.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
                        }
                        if (response.error.berat) {
                            $('#berat').addClass('is-invalid');
                            $('.errorBerat').html(response.error.berat);
                        } else {
                            $('#berat').removeClass('is-invalid');
                            $('.errorBerat').html('');
                        }
                        if (response.error.nama_prod) {
                            $('#nama_prod').addClass('is-invalid');
                            $('.errorNama_prod').html(response.error.nama_prod);
                        } else {
                            $('#nama_prod').removeClass('is-invalid');
                            $('.errorNama_prod').html('');
                        }


                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: response.sukses,
                        });

                        $('#modaltambah').modal('hide');
                        datapegawai();
                        jumlahpegawai();
                        totalgaji();
                    }
                }
            });
        });
    });
</script>