<div class="container-fluid">
    <h1 class="mt-4">Tambah Gejala</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=gejala">Gejala</a></li>
        <li class="breadcrumb-item active">Tambah Gejala</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Nama Gejala</label>
                    <input type="text" name="namaGejala" class="form-control">
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

    $simpan = $koneksi->query("INSERT INTO gejala (nama_gejala) VALUES ('$namaGejala')");

    if ($simpan) {
        $_SESSION['notif']['judul'] = 'berhasil ditambahkan.';
        $_SESSION['notif']['status'] = 'alert-success';
    }else {
        $_SESSION['notif']['judul'] = 'gagal ditambahkan.';
        $_SESSION['notif']['status'] = 'alert-danger';
    }

    echo "<script>location='index.php?page=gejala'</script>";
}