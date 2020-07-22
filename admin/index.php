<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DET-AUTIS - Admin</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <?php include "../config/koneksi.php"; ?>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">DET-AUTIS</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="hidden" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Users
                        </a>
                        <a class="nav-link" href="?page=artikel">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Artikel
                        </a>
                        <a class="nav-link" href="?page=gejala">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Gejala
                        </a>
                        <a class="nav-link" href="?page=jadwal">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Jadwal
                        </a>
                        <a class="nav-link" href="?page=profil">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Profil
                        </a>
                        <div class="sb-sidenav-menu-heading">System</div>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    ADMIN
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {

                        case 'artikel':
                            include "Artikel/index.php";
                            break;
                        case 'artikel-tambah':
                            include "Artikel/tambah.php";
                            break;
                        case 'artikel-ubah':
                            include "Artikel/ubah.php";
                            break;
                        case 'artikel-hapus':
                            include "Artikel/hapus.php";
                            break;
                        case 'gejala':
                            include "Gejala/index.php";
                            break;
                        case 'gejala-tambah':
                            include "Gejala/tambah.php";
                            break;
                        case 'gejala-ubah':
                            include "Gejala/ubah.php";
                            break;
                        case 'gejala-hapus':
                            include "Gejala/hapus.php";
                            break;
                        case 'jadwal':
                            include "Jadwal/index.php";
                            break;
                        case 'jadwal-tambah':
                            include "Jadwal/tambah.php";
                            break;
                        case 'jadwal-ubah':
                            include "Jadwal/ubah.php";
                            break;
                        case 'jadwal-hapus':
                            include "Jadwal/hapus.php";
                            break;
                        case 'profil':
                            include "Profil/index.php";
                            break;
                        case 'profil-tambah':
                            include "Profil/tambah.php";
                            break;
                        case 'profil-ubah':
                            include "Profil/ubah.php";
                            break;
                        case 'profil-hapus':
                            include "Profil/hapus.php";
                            break;

                        case 'users':
                            include "Users/index.php";
                            break;
                        case 'users-hapus':
                            include "Users/hapus.php";
                            break;

                        default:
                            # code...
                            break;
                    }
                } else {
                    include "Users/index.php";
                }
                ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; DETEKSI AUTIS 2020</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>