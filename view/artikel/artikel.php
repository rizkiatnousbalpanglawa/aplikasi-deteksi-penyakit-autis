<div class="container">
    <h3 class="mt-2"> <i class="fa fa-files-o"></i> Artikel</h3>
    <hr class="mt-0 bg-biru">

    <?php $getArtikel = $koneksi->query("SELECT * FROM artikel") ?>
    <?php while ($dataArtikel = $getArtikel->fetch_assoc()) : ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><?= $dataArtikel['judul'] ?></h5>
                <p class="card-text "><?= $dataArtikel['isi'] ?></p>
            </div>
        </div>
    <?php endwhile ?>


</div>