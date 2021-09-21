<table class="table table-striped table-bordered fixed" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr style="text-align: center;">
            <th>Foto</th>
            <th>Pegawai</th>
            <th>Lokasi</th>
            <th>Waktu</th>
            <th>Customer</th>
            <th>Catatan</th>
            <?php if (session()->get('role') == 1 or session()->get('role') == 2) : ?>
                <th>Produk</th>
                <th>Action</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($absensi as $a) : ?>
            <tr class="text-center">
                <td class="align-middle"><img src=" <?= base_url('uploads/absensi') . '/' . $a['foto']; ?>" width="150px" class="img-thumbnail"></td>
                <td class="align-middle"><b><?= $a['nama']; ?></b><br><?= $a['nip']; ?></td>
                <td class="align-middle">Lat: <?= $a['latitude']; ?><br>Lng: <?= $a['longitude']; ?></td>
                <td class="align-middle"><?= $a['created_at']; ?></td>
                <td class="align-middle"><?= $a['cust']; ?></td>
                <td class="align-middle"><?= $a['catatan']; ?></td>
                <?php if (session()->get('role') == 1 or session()->get('role') == 2) : ?>
                    <td class="align-middle"><?= $a['prod']; ?></td>
                    <td class="align-middle">
                        <button class="btn btn-danger btn-sm" onclick="hapus(<?= $a['id']; ?>)"><i class="fa fa-trash"></i></button>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "columnDefs": [{
                "targets": 0,
                "orderable": false,
            }]
        });
    });

    function hapus(id) {
        Swal.fire({
            title: 'Hapus data?',
            text: `Apakah anda yakin menghapus data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('Absensi/hapus') ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.sukses,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            dataabsensi();
                        }
                    }
                });
            }
        })
    }



    var mymap = L.map('mapid').setView([-4.93847969856506, 105.40458629666973], 8);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    /////
    <?php foreach ($absensi as $a) { ?>


        var Marker = L.marker([<?= $a['latitude']; ?>, <?= $a['longitude']; ?>]).bindPopup('<b><?= $a['nama']; ?></b><br><?= $a['catatan']; ?> <br><?= $a['created_at']; ?> <br>Kepada : <?= $a['cust']; ?> <br>Produk : <?= $a['prod']; ?> <br> <img src ="<?= base_url('uploads/absensi') . '/' . $a['foto']; ?>" style="width:100%;height:150px;" />').addTo(mymap);


    <?php } ?>
    ////////


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);
</script>