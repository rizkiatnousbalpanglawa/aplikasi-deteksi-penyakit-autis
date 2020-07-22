<?php $id = $_GET['id'] ?>
<?php $getGejala = $koneksi->query("SELECT * FROM gejala WHERE id = '$id'") ?>
<?php $dataGejala = $getGejala->fetch_assoc() ?>
<div class="container-fluid">
    <h1 class="mt-4">Ubah Gejala</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=gejala">Gejala</a></li>
        <li class="breadcrumb-item active">Ubah Gejala</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Nama Gejala</label>
                    <input type="text" name="namaGejala" class="form-control" value="<?= $dataGejala['nama_gejala'] ?>">
                </div>
                <div class="form-group text-right">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $namaGejala = $_POST['namaGejala'];

    $simpan = $koneksi->query("UPDATE gejala SET nama_gejala = '$namaGejala' WHERE id = '$id'");

    if ($simpan) {
        $_SESSION['notif']['judul'] = 'berhasil diubah.';
        $_SESSION['notif']['status'] = 'alert-success';
    }else {
        $_SESSION['notif']['judul'] = 'gagal diubah.';
        $_SESSION['notif']['status'] = 'alert-danger';
    }

    echo "<script>location='index.php?page=gejala'</script>";
}