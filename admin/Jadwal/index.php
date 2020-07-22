<div class="container-fluid">
    <h1 class="mt-4">Jadwal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Jadwal</li>
    </ol>

    <!-- Menampilkan Notifikasi Jika Ada -->
    <?php if (isset($_SESSION['notif'])) : ?>
        <div class="alert <?= $_SESSION['notif']['status'] ?> alert-dismissible fade show" role="alert">
            Data <strong><?= $_SESSION['notif']['judul'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['notif']) ?>
    <?php endif ?>
    <!-- Batas Notifikasi -->

    <div class="card mb-4">
        <div class="card-body">
            <a href="?page=jadwal-tambah" class="btn btn-primary mb-4">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Waktu (WITA)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $getJadwal = $koneksi->query("SELECT * FROM jadwal") ?>
                        <?php $no = 1;
                        while ($dataJadwal = $getJadwal->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dataJadwal['hari'] ?></td>
                                <td><?= $dataJadwal['waktu'] ?></td>
                                <td>
                                    <a href="index.php?page=jadwal-ubah&id=<?= $dataJadwal['id'] ?>" class="btn btn-info">Ubah</a>
                                    <a href="index.php?page=jadwal-hapus&id=<?= $dataJadwal['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a>

                                </td>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>