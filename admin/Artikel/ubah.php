<?php $id = $_GET['id'] ?>
<?php $getArtikel = $koneksi->query("SELECT * FROM artikel WHERE id = '$id'") ?>
<?php $dataArtikel = $getArtikel->fetch_assoc() ?>
<div class="container-fluid">
    <h1 class="mt-4">Ubah Artikel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=artikel">Artikel</a></li>
        <li class="breadcrumb-item active">Ubah Artikel</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?= $dataArtikel['judul'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                   <textarea name="isi" id="" cols="30" rows="10" class="form-control"><?= $dataArtikel['isi'] ?></textarea>
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
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $simpan = $koneksi->query("UPDATE artikel SET judul = '$judul', isi = '$isi' WHERE id = '$id'");

    if ($simpan) {
        $_SESSION['notif']['judul'] = 'berhasil diubah.';
        $_SESSION['notif']['status'] = 'alert-success';
    }else {
        $_SESSION['notif']['judul'] = 'gagal diubah.';
        $_SESSION['notif']['status'] = 'alert-danger';
    }

    echo "<script>location='index.php?page=artikel'</script>";
}