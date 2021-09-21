<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="suratModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Edit surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('News/edit', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <input type="text" name="id" id="id_news" value="<?= $id; ?>" hidden>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">judul</label>
                    <div class="col-sm-8">
                        <input type="f" class="form-control" id="judul" name="judul" value="<?= $judul; ?>">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">deskripsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="desk" name="desk" value="<?= $desk; ?>">
                        <div class="invalid-feedback errorLokasi">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">link</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="link" name="link" value="<?= $link; ?>">
                        <div class="invalid-feedback errorTgl_mulai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal; ?>">
                        <div class="invalid-feedback errorTgl_mulai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="foto" name="foto" value="<?= $foto; ?>">
                        <div class="invalid-feedback errorTgl_mulai">

                        </div>
                    </div>
                </div>


            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formedit').submit(function(e) {
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
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Update');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil...',
                        text: response.sukses,
                    });

                    $('#modaledit').modal('hide');
                    datasurat();
                    jumlahsurat();
                }
            });
        });
    });
</script>