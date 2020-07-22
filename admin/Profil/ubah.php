<?php $id = $_GET['id'] ?>
<?php $getProfil = $koneksi->query("SELECT * FROM profil WHERE id = '$id'") ?>
<?php $dataProfil = $getProfil->fetch_assoc() ?>
<div class="container-fluid">
    <h1 class="mt-4">Ubah Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=profil">Profil</a></li>
        <li class="breadcrumb-item active">Ubah Profil</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Menu</label>
                    <input type="text" name="menu" class="form-control" value="<?= $dataProfil['menu'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                   <textarea name="content" id="" cols="30" rows="10" class="form-control"><?= $dataProfil['content'] ?></textarea>
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
    $menu = $_POST['menu'];
    $content = $_POST['content'];

    $simpan = $koneksi->query("UPDATE profil SET menu = '$menu', content = '$content' WHERE id = '$id'");

    if ($simpan) {
        $_SESSION['notif']['judul'] = 'berhasil diubah.';
        $_SESSION['notif']['status'] = 'alert-success';
    }else {
        $_SESSION['notif']['judul'] = 'gagal diubah.';
        $_SESSION['notif']['status'] = 'alert-danger';
    }

    echo "<script>location='index.php?page=profil'</script>";
}