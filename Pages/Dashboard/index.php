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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/styling/utils.css">
    <link rel="stylesheet" href="../../dist/styling/templatesStyle/index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>My Barbershop <?php if ($username == 'admin') {
                                echo  '| Admin';
                            } ?></title>
</head>

<body>
    <?php require '../templates/navbar.php';
    require '../templates/sidebar.php';
    ?>

    <div class="main-content">
        <section class="section">
            <h1>konten</h1>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>