<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <?php include "../config/koneksi.php" ?>
</head>

<body class="bg-putih">

    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'mulai-diagnosa':
                include "deteksi/diagnosa-pertanyaan.php";
                break;
            case 'riwayat':
                include "akun/riwayat.php";
                break;
            case 'akun':
                include "akun/akun.php";
                break;
            case 'deteksi':
                include "deteksi/deteksi.php";
                break;
            case 'deteksi-pertanyaan':
                include "deteksi/deteksi-pertanyaan.php";
                break;
            case 'artikel':
                include "artikel/artikel.php";
                break;
            case 'about':
                include "about/about.php";
                break;


            default:
                # code...
                break;
        }
    } else {
        include "deteksi/deteksi.php";
    }
    ?>

    <br><br><br>
    <!-- header -->
    <nav class="navbar fixed-bottom bg-pink text-center">
        <div class="col-3 ">
            <a class="text-dark text-decoration-none" href="index.php?page=deteksi"><i class="fa fa-search-plus"></i>
                <div class="h6 mb-0">Deteksi</div>
            </a>
        </div>
        <div class="col-3 ">
            <a class="text-dark text-decoration-none" href="index.php?page=artikel"><i class="fa fa-files-o"></i>
                <div class="h6 mb-0">Artikel</div>
            </a>
        </div>
        <div class="col-3 ">
            <a class="text-dark text-decoration-none" href="index.php?page=about"><i class="fa fa-hospital-o"></i>
                <div class="h6 mb-0">About</div>
            </a>
        </div>
        <div class="col-3 ">
            <a class="text-dark text-decoration-none" href="index.php?page=akun"><i class="fa fa-users"></i>
                <div class="h6 mb-0">Akun</div>
            </a>
        </div>
    </nav>


    <!-- bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap-show-password.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).load(function() {
            $(".preloader").fadeOut();
        })
    </script>
</body>

</html>