<div class="container">
    <h3 class="mt-2"> <i class="fa fa-search-plus"></i> Deteksi</h3>
    <hr class="mt-0 bg-biru">

    <form action="" method="post" enctype="multipart/form-data">

        <?php $get = $koneksi->query("SELECT * FROM gejala") ?>
        <?php while ($set = $get->fetch_assoc()) : ?>
            <div class="card shadow mb-2">
                <div class="text-center mt-3">
                    <?= $set['nama_gejala'] ?>
                </div>
                <div class="card-body text-center">

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1<?= $set['id'] ?>" name="jawaban_<?= $set['id'] ?>" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="customRadioInline1<?= $set['id'] ?>">Ya</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2<?= $set['id'] ?>" name="jawaban_<?= $set['id'] ?>" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="customRadioInline2<?= $set['id'] ?>">Tidak</label>
                    </div>

                </div>
            </div>
        <?php endwhile ?>
        <br>
        <div class="form-group">
            <button type="submit" class="btn bg-biru text-putih btn-block rounded-0 shadow" name="simpan"><i class="fa fa-stethoscope"></i> SIMPAN</button>
        </div>
    </form>

</div>

<!-- metode -->
<?php
if (isset($_POST['simpan'])) {
    $iduser = $_SESSION['id'];
    $getGejala = $koneksi->query("SELECT * FROM gejala");

    /* menyimpan hasil jawaban user */
    while ($dataGejala = $getGejala->fetch_assoc()) {
        ${'jawaban_' . $dataGejala['id']} = $_POST['jawaban_' . $dataGejala['id']];
        $query = "INSERT INTO `tbl_diagnosa`(`id_user`, `id_gejala`, `jawaban`) VALUES ('" . $iduser . "','" . $dataGejala['id'] . "' , '" . ${'jawaban_' . $dataGejala['id']} . "')";
        $simpan = $koneksi->query($query);

        if ($simpan) {
        } else {
            echo $koneksi->error;
        }
    }

    /* ============================================================= */
    /* menghitung jumlah factor  */
    $getJumlahFaktor = $koneksi->query("SELECT COUNT(id) as jumlahFactor FROM gejala");
    $dataJumlahFaktor = $getJumlahFaktor->fetch_assoc();
    $jumlahFaktor = $dataJumlahFaktor['jumlahFactor'];

    /* menghitung syarat CF */
    $syarat = 1 / 2;

    /* memulai perhitungan */
    $ambilJawaban = $koneksi->query("SELECT * FROM tbl_diagnosa WHERE id_user = '$iduser'");

    $no = 1;
    while ($dataJawaban = $ambilJawaban->fetch_assoc()) {
        ${'cf_user' . $no} = $dataJawaban['jawaban'] * $syarat;
        $no++;
    }

    /* menghitung cf_old */
    $cf_old = $cf_user1 + ($cf_user2 * (1 - $cf_user1));

    /* menghitung cf_combine */
    for ($i = 3; $i < $jumlahFaktor; $i++) {
        $cf_old = $cf_old + (${"cf_user" . $i} * (1 - $cf_old));
    }

    (float)$hasil = $cf_old * 100;
    $kodediagnosa = date("YdmHis");
    $waktu = date("Y-m-d");

    /* hapus data tabel diagnosa kemudian pindahkan ke tabel hasil diagnosa */
    $hapus = $koneksi->query("DELETE FROM tbl_diagnosa WHERE id_user='$iduser'");
    if ($hapus) {
        $koneksi->query("INSERT INTO `tbl_hasil_diagnosa`(`id_user`, `kode_diagnosa`, `presentase_hasil`, `tanggal`) VALUES('$iduser','$kodediagnosa','$hasil','$waktu')");
        $_SESSION['kode_diagnosa'] = $kodediagnosa;
        echo "<script>location='index.php?page=deteksi-hasil'</script>";
    }
}
