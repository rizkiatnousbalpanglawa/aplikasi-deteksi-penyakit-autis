<div class="container">
    <h3 class="mt-2"> <i class="fa fa-search-plus"></i> Deteksi</h3>
    <hr class="mt-0 bg-biru">

    <form action="deteksi-pertanyaan-hasil.php" method="post" enctype="multipart/form-data">

        <?php $get = $koneksi->query("SELECT * FROM gejala") ?>
        <?php while ($set = $get->fetch_assoc()) : ?>
            <div class="card shadow mb-2">
                <div class="text-center mt-3">
                    <?= $set['nama_gejala'] ?>
                </div>
                <div class="card-body text-center">
                    <input type="hidden" name="id_<?= $set['id'] ?>" value="<?= $set['id'] ?>">

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="jawaban_<?= $set['id'] ?>" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Ya</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="jawaban_<?= $set['id'] ?>" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Tidak</label>
                    </div>

                </div>
            </div>
        <?php endwhile ?>
        <br>
        <div class="form-group">
            <button class="btn bg-biru text-putih btn-block rounded-0 shadow" name="simpan"><i class="fa fa-stethoscope"></i> SIMPAN</button>
        </div>
    </form>

</div>