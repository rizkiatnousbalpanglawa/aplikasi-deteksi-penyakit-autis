<?php

$id = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM profil WHERE id = '$id'");

if ($hapus) {
    $_SESSION['notif']['judul'] = 'berhasil dihapus.';
    $_SESSION['notif']['status'] = 'alert-success';
}else {
    $_SESSION['notif']['judul'] = 'gagal dihapus.';
    $_SESSION['notif']['status'] = 'alert-danger';
}

echo "<script>location='index.php?page=profil'</script>";
