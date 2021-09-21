<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Proyek/edit', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="text" name="id" id="id" value="<?= $proyek['id_proyek']; ?>" hidden>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Produk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $proyek['nama']; ?>">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $proyek['lokasi']; ?>">
                        <div class="invalid-feedback errorLokasi">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Batch</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Batch" name="Batch" value="<?= $proyek['Batch']; ?>">
                        <div class="invalid-feedback errorBatch">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Kode" name="Kode" value="<?= $proyek['Kode']; ?>">
                        <div class="invalid-feedback errorKode">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="datetime" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= $proyek['tgl_mulai']; ?>" readonly>
                        <div class="invalid-feedback errorTgl_mulai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal selesai</label>
                    <div class="col-sm-8">
                        <input type="datetime" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                        <div class="invalid-feedback errorTgl_selesai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Produk</label>
                    <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" name="status">
                            <option value="dalam proses" <?php if ($proyek['status'] == 'dalam proses') echo 'selected'; ?>>dalam proses</option>
                            <option value="selesai" <?php if ($proyek['status'] == 'selesai') echo 'selected'; ?>>selesai</option>
                            <option value="dibatalkan" <?php if ($proyek['status'] == 'dibatalkan') echo 'selected'; ?>>dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Quality</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" max="100" class="form-control" id="progress" name="progress" value="<?= $proyek['progress']; ?>">
                        <div class="invalid-feedback errorProgress">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Biaya Produk</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="dana" name="dana" value="<?= $proyek['dana']; ?>">
                        <div class="invalid-feedback errorProgress">

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
                    dataproyek();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>