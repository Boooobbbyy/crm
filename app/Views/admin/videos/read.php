<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr style="text-align: center;">
            <th>No.</th>
            <th>Judul </th>
            <th>Video </th>
            <th>tanggal </th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($videos as $j) : ?>

            <tr style="text-align: center;">
                <td style="width:10px"><?= $no++; ?></td>
                <td style="width:100px"><?= $j['judul']; ?></td>
                <td>
                    <iframe width="200" height="100" src="<?= $j['link']; ?>">
                    </iframe>
                </td>
                <td><?= $j['tanggal']; ?></td>

                <td>
                    <button class="btn btn-warning btn-sm" onclick="edit(<?= $j['id_vid']; ?>)"><i class="fa fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="hapus(<?= $j['id_vid']; ?>)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "columnDefs": [{
                "targets": [6],
                "orderable": false,
            }]
        });
    });

    function edit(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Videos/form_edit'); ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            }
        });
    }

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
                    url: "<?= base_url('Videos/hapus') ?>",
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
                            datasurat();
                            jumlahsurat();
                        }
                    }
                });
            }
        })
    }
</script>