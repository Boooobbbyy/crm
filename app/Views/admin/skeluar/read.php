<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr style="text-align: center;">
            <th>No.</th>
            <th>Nama </th>
            <th>PKS/MoU </th>
            <th>Kode </th>
            <th>tanggal </th>
            <th>Produk </th>
            <?php if (session()->get('role') == 2 or session()->get('role') == 1) : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($srtk as $j) : ?>
            <tr style="text-align: center;">
                <td><?= $no++; ?></td>
                <td><?= $j['nama']; ?></td>
                <td><?= $j['nomor']; ?></td>
                <td><?= $j['dari']; ?></td>
                <td><?= $j['tanggal']; ?></td>
                <td><?= $j['surat']; ?></td>
                <td>
                    <?php if (session()->get('role') == 2 or session()->get('role') == 1) : ?>
                        <button class="btn btn-success btn-sm" onclick="detail(<?= $j['id_srt']; ?>)"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="edit(<?= $j['id_srt']; ?>)"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="hapus(<?= $j['id_srt']; ?>)"><i class="fa fa-trash"></i></button>
                    <?php endif; ?>
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
            url: "<?= base_url('SuratKeluar/form_edit'); ?>",
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
                    url: "<?= base_url('SuratKeluar/hapus') ?>",
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