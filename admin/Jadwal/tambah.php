<div class="container-fluid">
    <h1 class="mt-4">Tambah Jadwal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=jadwal">Jadwal</a></li>
        <li class="breadcrumb-item active">Tambah Jadwal</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Hari</label>
                    <input type="text" name="hari" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Waktu (WITA)</label>
                    <input type="text" name="waktu" class="form-control">
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
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];

    $simpan = $koneksi->query("INSERT INTO jadwal (hari,waktu) VALUES ('$hari','$waktu')");

    if ($simpan) {
        $_SESSION['notif']['judul'] = 'berhasil ditambahkan.';
        $_SESSION['notif']['status'] = 'alert-success';
    } else {
        $_SESSION['notif']['judul'] = 'gagal ditambahkan.';
        $_SESSION['notif']['status'] = 'alert-danger';
    }

    echo "<script>location='index.php?page=jadwal'</script>";
}
