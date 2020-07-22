<div class="container">
    <h3 class="mt-2"> <i class="fa fa-hospital-o"></i> About</h3>
    <hr class="mt-0 bg-biru">

    <?php $getProfil = $koneksi->query("SELECT * FROM profil") ?>
    <?php while ($dataProfil = $getProfil->fetch_assoc()) : ?>
        <div class="h5 text-center">
            <?= $dataProfil['menu'] ?>
        </div>
        <div class="h6">
            <?= $dataProfil['content'] ?>
        </div>
        <br>
    <?php endwhile ?>
    <div class="h5 text-center">
        Jadwal
    </div>
    <table class="table table-condensed table-bordered table-sm">
        <thead>
            <tr>
                <th class="text-center">Hari</th>
                <th class="text-center">Waktu (WITA)</th>
            </tr>
        </thead>
        <tbody>
            <?php $getJadwal = $koneksi->query("SELECT * FROM jadwal") ?>
            <?php while ($dataJadwal = $getJadwal->fetch_assoc()): ?>
            <tr>
                <td><?= $dataJadwal['hari'] ?></td>
                <td><?= $dataJadwal['waktu'] ?></td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>