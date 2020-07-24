<?php $kodediagnosa = $_SESSION['kode_diagnosa'] ?>
<?php $gethasildiagnosa = $koneksi->query("SELECT * FROM tbl_hasil_diagnosa WHERE kode_diagnosa = '$kodediagnosa'") ?>
<?php $datadiagnosa = $gethasildiagnosa->fetch_assoc(); ?>
<div class="container">
    <h3 class="mt-2"> <i class="fa fa-search-plus"></i> Hasil Deteksi</h3>
    <hr class="mt-0 bg-biru">

    <div class="card shadow mb-3  rounded-0">
        <div class="card-body">
            <div class="text-uppercase">
                <?= date("d F Y",strtotime($datadiagnosa['tanggal'])) ?>
            </div>
            <div class="text-center h2 text-biru font-weight-bold">
                <?= $datadiagnosa['presentase_hasil'] ?> %
            </div>
            <div class="text-center">
                Bila Anda Ingin Perawatan Lebih Lanjut, Silahkan Hubungi Klinik Amanah Inayah
            </div>
        </div>
    </div>
    
</div>