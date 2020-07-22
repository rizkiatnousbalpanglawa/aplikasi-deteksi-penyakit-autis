<?php $id_user = $_SESSION['id'] ?>
<?php $get = $koneksi->query("SELECT * FROM user WHERE id_user = '$id_user'") ?>
<?php $set = $get->fetch_assoc(); $jenisKelamin =($set['jenis_kelamin'] == 1) ? "Lakilaki" : "Perempuan"; ?>
<div class="container">
    <h3 class="mt-2"> <i class="fa fa-users"></i> Akun</h3>
    <hr class="mt-0 bg-biru">

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" placeholder="Nama Saya" name="nama" value="<?= $set['nama_user'] ?>">
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" placeholder="Tempat Lahir Saya" name="nama" value="<?= $set['tempat_lahir'] ?>">
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" id="" value="<?= date("d M Y", strtotime($set['tanggal_lahir'])) ?>">
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <input type="text" class="form-control" placeholder="Jenis Kelamin Saya" name="jenis_kelamin" value="<?= $jenisKelamin;  ?>">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat Saya" name="alamat" value="<?= $set['alamat'] ?>">
        </div>

        <div class="form-group">
            <label for="">Kata Sandi</label>
            <div class="input-group">
                <input type="password" class="form-control" data-toggle="password" name="katasandi" value="<?= $set['kata_sandi'] ?>">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-eye"></i></div>
                </div>
            </div>
        </div>
        <!-- <button class="btn bg-biru btn-block rounded-0"><i class="fa fa-pencil-square-o"></i> Ubah</button> -->
        <button class="btn bg-pink btn-block rounded-0" name="keluar"><i class="fa fa-history"></i> Riwayat</button>
        <button class="btn bg-pink btn-block rounded-0" name="keluar"><i class="fa fa-sign-out"></i> Logout</button>
    </form>
</div>

<?php

if (isset($_POST['keluar'])) {
    echo "<script>location='logout.php'</script>";
}