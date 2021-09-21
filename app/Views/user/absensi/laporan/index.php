<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="viewpegawai"></span> Pegawai</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Absen Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="viewmasuk"></span> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Absen Pulang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="viewpulang"></span> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Absensi Harian</h6>
    </div>
    <?= form_open('Absensi/fetch_data', ['class' => 'formcari']) ?>
    <div class="form-group ml-2 mt-3 row">
        <div class="col-sm-3">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d'); ?>">
        </div>
        <button type="submit" class="btn btn-success btncari">Lihat Data</button>
    </div>
    <?= form_close() ?>
    <div class="card-body">
        <div class="table-responsive">
            <div class="viewdata"></div>
        </div>
    </div>
</div>
<div id="mapid" style="width: 1000px; height: 400px;"></div>
<?= $this->endSection(); ?>

<?= $this->section('myscript'); ?>
<script>
    function dataabsensi() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Absensi/fetch_data'); ?>",
            data: {
                tanggal: $('input#tanggal').val(),
            },
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
                $('.viewpegawai').html(response.jumlahpegawai);
                $('.viewmasuk').html(response.jumlahmasuk);
                $('.viewpulang').html(response.jumlahpulang);
            }
        });
    }
    $(document).ready(function() {
        dataabsensi();

        $('.formcari').submit(function(e) {
            e.preventDefault();
            dataabsensi();
        });
    });
</script>

<?= $this->endSection(); ?>