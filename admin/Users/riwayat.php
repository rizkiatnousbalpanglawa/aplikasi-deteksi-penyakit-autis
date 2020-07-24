<?php $id = $_GET['id'] ?>
<?php $getriwayat = $koneksi->query("SELECT * FROM tbl_hasil_diagnosa WHERE id_user = '$id' ORDER BY id DESC"); ?>
<?php $getuser = $koneksi->query("SELECT * FROM user WHERE id_user = '$id'"); ?>
<?php $datauser = $getuser->fetch_assoc(); ?>

<div class="container-fluid">
    <h1 class="mt-4">Riwayat Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Riwayat Users</li>
        <li class="breadcrumb-item active"><?= $datauser['nama_user'] ?></li>

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
                            <th>Tanggal</th>
                            <th>Presentase Hasil</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($datariwayat = $getriwayat->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= date("d M Y", strtotime($datariwayat['tanggal'])) ?></td>
                                <td><?= $datariwayat['presentase_hasil'] ?> %</td>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>