<div class="container-fluid">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
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
            <!-- <a href="?page=user-tambah" class="btn btn-primary mb-4">Tambah</a> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $getUsers = $koneksi->query("SELECT * FROM user") ?>
                        <?php $no = 1;
                        while ($dataUsers = $getUsers->fetch_assoc()) :
                            $jenis_kelamin = ($dataUsers['jenis_kelamin'] == 1) ? "Laki - laki" : "Perempuan";
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dataUsers['nama_user'] ?></td>
                                <td><?= $dataUsers['tempat_lahir'] ?>, <?= date("d M Y", strtotime("tanggal_lahir")) ?></td>
                                <td><?= $jenis_kelamin ?></td>
                                <td><?= $dataUsers['alamat'] ?></td>

                                <td>
                                    <a href="index.php?page=users-riwayat&id=<?= $dataUsers['id'] ?>" class="btn btn-primary">Riwayat</a>
                                    <a href="index.php?page=users-hapus&id=<?= $dataUsers['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a>

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