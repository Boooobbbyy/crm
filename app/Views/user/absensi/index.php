<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <i class="mdi mdi-image-filter-hdr"></i> Ambil Bukti Foto <br>
                <hr>
                <div class="form-group text-center">
                    <div id="my_camera">

                    </div>
                </div>
                <input type="hidden" name="imagecam" id="imagecam" class="image-tag">
                <div class="invalid-feedback errorFoto">
                </div>
                <button class="mt-2 btn btn-primary btnambil" onclick="take_picture();"><i class="fa fa-camera"></i> Ambil</button>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <?= form_open('Absensi/submit', ['class' => 'formtambah']) ?>
            <div class="card-body">
                <i class="mdi mdi-circle-edit-outline"></i> Absensi Harian Pegawai
                <hr>
                <input type="hidden" class="form-control" id="konfigurasi_id" name="konfigurasi_id" readonly>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account"></i>
                            Nama Pegawai
                        </label>
                        <input type="text" id="nama" name="nama" value="<?= $profile['nama']; ?>" class="form-control" readonly>
                        <div class="invalid-feedback errorUsername">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-card-account-details"></i>
                            NIP
                        </label>
                        <input type="text" id="nip" name="nip" value="<?= $profile['nip']; ?>" class="form-control" readonly>
                        <div class="invalid-feedback errorEmail">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account"></i>
                            Nama Customer
                        </label>
                        <input type="text" id="cust" name="cust" class="form-control">
                        <div class="invalid-feedback errorUsername">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-card-account-details"></i>
                            Produk
                        </label>
                        <input type="text" id="prod" name="prod" class="form-control">
                        <div class="invalid-feedback errorEmail">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-map-marker"></i>
                            latitude
                        </label>
                        <input type="text" id="latitude" name="latitude" class="form-control" readonly>
                        <small><span>Geolocation is most accurate for devices with GPS, like smartphones.</span></small>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-map-marker"></i>
                            longitude
                        </label>
                        <input type="text" id="longitude" name="longitude" class="form-control" readonly>
                        <div class="invalid-feedback errorGPS">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label> <i class=" mdi mdi-playlist-star"></i>
                        Catatan Harian
                    </label>
                    <textarea rows="3" type="text" id="deskripsi" name="deskripsi" class="form-control"></textarea>
                    <div class="invalid-feedback errorDeskripsi">
                    </div>
                </div>

                <input type="hidden" name="browser" id="browser">
                <input type="hidden" name="device" id="device">
                <input type="hidden" name="keterangan" id="keterangan">

                <button type="submit" class="mt-2 btn btn-primary btnsimpan"><i class="fa fa-paper-plane"></i>Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('myscript'); ?>

<script>
    $('.formtambah').submit(function(e) {
        setKeterangan();
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: {
                nama: $('input#nama').val(),
                nip: $('input#nip').val(),
                cust: $('input#cust').val(),
                prod: $('input#prod').val(),
                latitude: $('input#latitude').val(),
                longitude: $('input#longitude').val(),
                deskripsi: $('textarea#deskripsi').val(),
                imagecam: $('input#imagecam').val(),
                browser: $('input#browser').val(),
                device: $('input#device').val(),
                keterangan: $('input#keterangan').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disable');
                $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable', 'disable');
                setKeterangan();
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.gps) {
                        $('#longitude').addClass('is-invalid');
                        $('.errorGPS').html(response.error.gps);
                    } else {
                        $('#longitude').removeClass('is-invalid');
                        $('.errorGPS').html('');
                    }
                    if (response.error.deskripsi) {
                        $('#deskripsi').addClass('is-invalid');
                        $('.errorDeskripsi').html(response.error.deskripsi);
                    } else {
                        $('#deskripsi').removeClass('is-invalid');
                        $('.errorDeskripsi').html('');
                    }
                    if (response.error.foto) {
                        $('#imagecam').addClass('is-invalid');
                        $('.errorFoto').html(response.error.foto);
                    } else {
                        $('#imagecam').removeClass('is-invalid');
                        $('.errorFoto').html('');
                    }
                    if (response.error.absen) {
                        Swal.fire({
                            title: "Oooopss!",
                            text: response.error.absen,
                            icon: "error",
                            showConfirmButton: false,
                            footer: '---',
                            timer: 1500
                        });
                    }
                } else {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = response.link;
                    });

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    })
</script>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 100,
        flip_horiz: true
    });
    Webcam.attach('#my_camera');

    function take_picture() {
        Webcam.snap(function(data_uri) {
            Webcam.reset();
            $(".image-tag").val(data_uri);
            document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
        });
        $('.btnambil').addClass('btn-secondary');
        $('.btnambil').attr('disabled', 'disabled');
        $('#imagecam').removeClass('is-invalid');
        $('.errorFoto').html('');
    }
</script>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            $('input#longitude').addClass('is-invalid');
            $('.errorGPS').html("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        $('input#latitude').val(position.coords.latitude);
        $('input#longitude').val(position.coords.longitude);
    }

    function getDevice() {
        $('input#browser').val(navigator.userAgent.split(" ")[8]);
        $('input#device').val(navigator.userAgent.split(" ")[2] + ' ' + navigator.userAgent.split(" ")[3].split(")")[0]);
    }

    function setKeterangan() {
        var current = new Date();
        var waktu = current.getHours();

        if (waktu >= 00 && waktu <= 07) {
            $('input#keterangan').val("Masuk");
            $('.btnsimpan').html('<i class = "fa fa-paper-plane"></i> Masuk');
        } else if (waktu >= 8 && waktu <= 13) {
            $('input#keterangan').val("Datang Terlambat");
            $('.btnsimpan').html('<i class = "fa fa-paper-plane"></i> Datang Terlambat');
        } else if (waktu >= 14 && waktu <= 16) {
            $('input#keterangan').val("Pulang");
            $('.btnsimpan').html('<i class = "fa fa-paper-plane"></i> Pulang');
        } else if (waktu >= 17 && waktu <= 21) {
            $('input#keterangan').val("Lembur");
            $('.btnsimpan').html('<i class = "fa fa-paper-plane"></i> Lembur');
        } else {
            $('input#keterangan').val('0');
            $('.btnsimpan').addClass('btn-secondary');
            $('.btnsimpan').attr('disabled', 'disabled');
            $('.btnsimpan').html('<i class = "fa fa-paper-plane"></i> Waktu Absensi Sudah Selesai');
        }
    }

    $(document).ready(function() {
        getLocation();
        getDevice();
        $('#deskripsi').keyup(function() {
            if ($(this).val().length < 10) {
                $('#deskripsi').addClass('is-invalid');
                $('.errorDeskripsi').html('Catatan Terlalu singkat');
            } else {
                $('#deskripsi').removeClass('is-invalid');
                $('.errorDeskripsi').html('');
            }
        });
        setKeterangan();
    });
</script>
<?= $this->endSection(); ?>