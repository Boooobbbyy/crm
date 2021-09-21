<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $proyek['nama']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $proyek['lokasi']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Batch</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Batch" name="Batch" value="<?= $proyek['Batch']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Kode" name="Kode" value="<?= $proyek['Kode']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= $proyek['tgl_mulai']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $proyek['tgl_selesai']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" placeholder="<?= $proyek['status']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Quality</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="progress" name="progress" value="<?= $proyek['progress']; ?>%" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Biaya Produk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="dana" name="dana" value="Rp. <?= number_format($proyek['dana'], 2, ',', '.'); ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>