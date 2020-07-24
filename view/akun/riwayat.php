<?php $iduser = $_SESSION['id'] ?>
<?php $gethasildiagnosa = $koneksi->query("SELECT * FROM tbl_hasil_diagnosa WHERE id_user = '$iduser' ORDER BY id DESC") ?>

<div class="container">
    <h3 class="mt-2"> <i class="fa fa-history"></i> Riwayat</h3>
    <hr class="mt-0 bg-biru">

    <?php while($datadiagnosa = $gethasildiagnosa->fetch_assoc()): ?>
    <div class="card shadow mb-3 rounded-0">
        <div class="card-body">
            <div class="text-uppercase">
                <?= date("d F Y",strtotime($datadiagnosa['tanggal'])) ?>
            </div>
            <div class="text-center h2 text-biru font-weight-bold">
                <?= $datadiagnosa['presentase_hasil'] ?> %
            </div>
           
        </div>
    </div>
    <?php endwhile ?>

</div>