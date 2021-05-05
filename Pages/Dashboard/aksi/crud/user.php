<?php
session_start();
require '../../../../backend/functions.php';
if (!$_SESSION['login']) {
    header('Location: ../../../../index.php');
    exit();
}
$username = $_SESSION['dataUser']['username'];
$sql = 'SELECT * FROM menu';
$menus = query($sql);

$uid = $_GET['id'];
$sqlForDetail = "SELECT * FROM user WHERE uid = '$uid'";
$detailUser = query($sqlForDetail);

// UPDATE USER
if (isset($_POST['update'])) {
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'][0];

    $sqlUpdate = "UPDATE user SET username = '$username', fullname = '$fullname', role = '$role' WHERE uid = '$uid'";
    $userUpdated = mysqli_query($koneksi, $sqlUpdate);

    if ($userUpdated === true) {
        echo "<div class='container'>
                <p class='flash-msg text-center' style='
                color: green;
                width: 400px;
                margin-left: 255px;
                margin-top: 86px;
                margin-bottom: -74px;
                border: 1px solid;
                '>Berhasil di Update!</p>
            </div>";
    } else {
        echo "<div class='container'>
                <p class='flash-msg text-center' style='
                color: green;
                width: 400px;
                margin-left: 255px;
                margin-top: 86px;
                margin-bottom: -74px;
                border: 1px solid;
                '>Gagal di Update!</p>
            </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../dist/styling/utils.css">
    <link rel="stylesheet" href="../../../../dist/styling/templatesStyle/index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 50%;
            border: 1px solid #f2f5f7;
        }

        .table1 tr th {
            background: #35A9DB;
            color: #fff;
            font-weight: normal;
        }

        .table1,
        th,
        td {
            padding: 8px 20px;
            text-align: center;
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

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

        /* SIDEBAR STYLE */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            z-index: 880;
            background-color: transparent;
            color: white;
            display: grid;
            grid-template-rows: auto lfr auto;
            row-gap: 1rem;
            box-shadow: 0 4px 8px rgb(0 0 0 / 3%);
            transition: all .3s;
            transform: translate(-100%);
        }

        .show-sidebar {
            transform: translate(0);
        }

        .menu-header {
            padding: 3px 15px;
            color: #bcc1c6;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-weight: 600;
        }

        .sub-menu a {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 20px;
            width: 100%;
            letter-spacing: 0.3px;
            color: black;
            text-decoration: none;
        }

        @media screen and (min-width: 676px) {
            .sidebar {
                width: 250px;
            }
        }

        @media only screen and (max-width: 680px) {
            #navbar {
                left: 0px;
                width: 60vh;
            }

            .title-menu {
                margin-top: 4rem;
                color: white;
            }

            .main-content {
                padding-left: 40px;
                /* width: 400px; */
            }

            .sidebar {
                background-color: #007bff;
            }

            .menu-header {
                color: white;
            }
        }
    </style>
    <title>My Barbershop <?php if ($username == 'admin') {
                                echo '| Admin';
                            } ?></title>
</head>

<body style="max-width: 1000px;">
    <!-- NAVIGATION -->
    <nav id="navbar">
        <div class="container">
            <ul>
                <li class="list">
                    <div class="float-right d-flex profile">
                        <img src="../../../../dist/img/avatar-default.png" class="rounded-img">
                        <div>
                            <h3 class="font-white">Hi <?= $username ?></h3>
                            <a href="../../../logout.php" class="font-black">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <button type="button" class="sidebar-toggle btn mt-1">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    <aside class="sidebar show-sidebar">
        <ul class="sidebar-menu">
            <h2 class="text-center title-menu"><a href="../../menu/dashboard.php" class="font-black">My Barbershop</a></h2>
            <div class="mt-2">
                <?php foreach ($menus as $menu) : ?>
                    <li class="menu-header"><?= $menu['nama_menu']; ?></li>
                    <li class="sub-menu"><a href="../../<?= $menu['menu_link'] . '.php'; ?>"><i class='<?= $menu['menu_icon']; ?>'></i> <?= $menu['nama_menu']; ?></a></li>
                <?php endforeach; ?>
            </div>
        </ul>
    </aside>
    <!-- END OF NAVIGATION -->

    <div class="main-content">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title-data">
                            <?php foreach ($detailUser as $user) : ?>
                                <h2>Detail <?= $user['fullname'] ?></h2>
                                <div class="container mt-2">

                                    <form action="" method="POST">

                                        <input type="hidden" name="uid" id="uid" value="<?= $user['uid'] ?>">

                                        <label for="username">Username</label>
                                        <input type="text" class="form-input" name="username" id="username" value="<?= $user['username'] ?>" style="width: 400px;">

                                        <label for="fullname">Fullname</label>
                                        <input type="text" class="form-input" name="fullname" id="fullname" value="<?= $user['fullname'] ?>" style="width: 400px;">

                                        <label for="role">Role User</label>
                                        <input type="text" class="form-input" name="role" id="role" value="<?=
                                                        $user['role'];
                                                        if ($user['role'] == '1') {
                                                            echo ' Admin';
                                                        } else {
                                                            echo ' User';
                                                        }
                                                        ?>" style="width: 400px;">

                                        <!-- UPDATE STATE -->
                                        <button type="submit" class="btn btn-warning mt-1 font-black" name="update" id="update">Update</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                            <a href="../../../Dashboard/menu/dashboard.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        const toggleBtn = document.querySelector('.sidebar-toggle');
        const closeBtn = document.querySelector('.close-btn');
        const sidebar = document.querySelector('.sidebar');
        const navbar = document.querySelector('#navbar');
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show-sidebar');
        });
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('show-sidebar')
        })
    </script>
</body>

</html>