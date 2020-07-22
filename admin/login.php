<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <?php include "../config/koneksi.php" ?>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Notifikasi Jika Username dan Password Tidak Sesuai -->
                                    <?php if (isset($_SESSION['gagal'])) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>GAGAL!</strong> Username dan Password tidak ditemukan.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php unset($_SESSION['gagal']); endif ?>
                                    <!-- Batas Notifikasi -->
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUserName">Username</label>
                                            <input class="form-control py-4" id="inputUserName" name="uname" type="text" placeholder="Username Saya" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" name="pword" type="password" placeholder="Password Saya" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $cek = $koneksi->query("SELECT * FROM admin WHERE username = '$uname' AND kata_sandi = '$pword'");

        if ($cek->num_rows > 0) {
            $_SESSION['login'] = true;
            echo "<script>location='index.php'</script>";
        } else {
            $_SESSION['gagal'] = true;
            echo "<script>location='login.php'</script>";
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>