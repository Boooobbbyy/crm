<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Produk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $nama_prod; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Berat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="berat" name="berat" value="<?= $berat; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="datetime" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal; ?>" readonly>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>