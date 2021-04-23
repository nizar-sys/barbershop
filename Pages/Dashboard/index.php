<?php
session_start();
require '../../backend/functions.php';
if (!$_SESSION['login']) {
    header('Location: ../../index.php');
    exit;
}
$username = $_SESSION['dataUser']['username'];
$sql = "SELECT * FROM menu";
$menus = query($sql);
$sqlForData = "SELECT * FROM booking";
$datasBooking = query($sqlForData);

// CEK BANYAKNYA USER
$user = mysqli_query($koneksi, "SELECT * FROM user");
$jumlahUser = mysqli_num_rows($user);

// CEK BANYAKNYA INPUTAN UNTUK BOOKING
$bookingan = mysqli_query($koneksi, $sqlForData);
$jumlahBookingan = mysqli_num_rows($bookingan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/styling/templatesStyle/index.css">
    <link rel="stylesheet" href="../../dist/styling/utils.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .btn-warning {
            background-color: #e4e70f;
            border-color: #d4eb0b;
        }

        .btn-secondary {
            background-color: #2fb84c;
            border-color: #08f5ba;
        }

        .btn-danger {
            background-color: #e73a0f;
            border-color: #eb520b;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-success {
            background-color: #63ed7a;
        }

        .card {
            box-shadow: 0 4px 8px rgb(0 0 0 / 3%);
            background-color: #fff;
            border-radius: 3px;
            border: none;
            position: relative;
            margin-bottom: 30px;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            margin: 10px;
            border-radius: 3px;
            line-height: 94px;
            text-align: center;
            float: left;
            margin-right: 15px;
        }

        .card-header {
            padding-bottom: 0;
            padding-top: 10px;
        }
    </style>
    <title>My Barbershop <?php if ($username == 'admin') {
                                echo  '| Admin';
                            } ?></title>
</head>

<body>
    <!-- NAVIGATION -->
    <nav id="navbar">
        <div class="container">
            <ul>
                <li class="list">
                    <div class="float-right d-flex profile">
                        <img src="../../dist/img/avatar-default.png" class="rounded-img">
                        <div>
                            <h3 class="font-white">Hi <?= $username; ?></h3>
                            <a href="../logout.php" class="font-black">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="main-sidebar">
        <div class="title-sidebar text-center">
            <h3><a href="./index.php" class="font-black">My Barbershop</a></h3>
        </div>
        <ul class="sidebar-menu">
            <?php foreach ($menus as $menu) : ?>
                <li class="menu-header mt-2"><?= $menu['nama_menu']; ?></li>
                <li class="sub-menu"><a href="<?= $menu['menu_link'] . '.php'; ?>"><i class='<?= $menu['menu_icon']; ?>'></i> <?= $menu['nama_menu']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- END OF NAVIGATION -->

    <!-- KONTEN -->
    <div class="main-content">
        <div class="row">
            <h1 style="font-style: italic;">Hallo <?= $username; ?></h1>
        </div>
        <section class="section d-flex mt-2">
            <div class="row" style="padding: 0px 37px;">
                <div class="col">
                    <a href="./menu/dashboard.php" class="font-black">
                        <div class="card d-flex">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="card-header">
                                <h3>Total Akun</h3>
                                <h2><?= $jumlahUser; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="./menu/laporan.php" class="font-black">
                        <div class="card d-flex">
                            <div class="card-icon bg-success">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="card-header">
                                <h3>Request Bookingan</h3>
                                <h2><?= $jumlahBookingan; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- KONTEN END -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>