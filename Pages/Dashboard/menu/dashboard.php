<?php
session_start();
require '../../../backend/functions.php';
if (!$_SESSION['login']) {
    header('Location: ../../../index.php');
    exit;
}
$username = $_SESSION['dataUser']['username'];
$sql = "SELECT * FROM menu";
$menus = query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../dist/styling/utils.css">
    <link rel="stylesheet" href="../../../dist/styling/templatesStyle/index.css">
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
                        <img src="../../../dist/img/avatar-default.png" class="rounded-img">
                        <div>
                            <h3 class="font-white">Hi <?= $username; ?></h3>
                            <a href="../../logout.php" class="font-black">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="main-sidebar">
        <div class="title-sidebar text-center">
            <h3><a href="../index.php" class="font-black">My Barbershop</a></h3>
        </div>
        <ul class="sidebar-menu">
            <?php foreach ($menus as $menu) : ?>
                <li class="menu-header mt-2"><?= $menu['nama_menu']; ?></li>
                <li class="sub-menu"><a href="<?= $menu['menu_link'] . '.php'; ?>"><i class='<?= $menu['menu_icon']; ?>'></i> <?= $menu['nama_menu']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- END OF NAVIGATION -->

    <div class="main-content">
        <section class="section">
            <h1>dashboard</h1>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>