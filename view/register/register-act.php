<?php

include "../config/koneksi.php";

if (isset($_POST['login'])) {
    echo "<script>location='login.php'</script>";
} elseif (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $tempatLahir = $_POST['tempatLahir'];
    $tlahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
    $jenisKelamin = $_POST['jenisKelamin'];
    $alamat = $_POST['alamat'];
    $katasandi = $_POST['katasandi'];


    $cek = $koneksi->query("SELECT * FROM user WHERE nama_user='$nama' AND kata_sandi='$katasandi'");

    if (mysqli_num_rows($cek) === 1) {
        echo "<script>alert('Username dan Katasandi sudah ada');location='login.php'</script>";
    } else {
        $simpan = $koneksi->query("INSERT INTO `user`(`nama_user`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `kata_sandi`) VALUES ('$nama','$tempatLahir', '$tlahir','$jenisKelamin','$alamat','$katasandi')");

        if ($simpan) {
            echo "<script>location='login.php'</script>";
        } else {
            echo $koneksi->error;
        }
    }
}
