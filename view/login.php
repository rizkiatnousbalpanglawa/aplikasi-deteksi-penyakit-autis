<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #f7f7f7">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <h3 class="m-2"> <i class="fa fa-th-list"></i> Login</h3>
        <hr class="mt-0 mx-2 bg-biru">

    <div class="text-center">
        <i class="fa fa-unlock-alt fa-5x mt-4"></i>
    </div>

    <div class="container">
        <?php if (isset($_SESSION['sandi'])) : ?>
        <div class="alert alert-danger" role="alert">
            Username atau katasandi tidak sesuai!
        </div>
        <?php endif ?>
        <form action="login-act.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control rounded-0" name="nama" placeholder="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-0" name="katasandi" placeholder="katasandi">
            </div>
            <div class="form-group text-center">
                <button class="btn rounded-0 btn-block bg-biru text-putih" name="login"> <i class="fa fa-sign-in"></i>
                    LOGIN</button>
                <button class="btn bg-kuning rounded-0 btn-block" name="daftar"> <i class="fa fa-pencil-square-o"></i>
                    DAFTAR</button>
            </div>
        </form>
        <?php unset($_SESSION['sandi']) ?>
    </div>


    <!-- bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).load(function () {
            $(".preloader").fadeOut();
        })
    </script>
</body>

</html>