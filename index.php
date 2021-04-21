<?php

session_start();
require 'backend/functions.php';


if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");
    if (!$result || mysqli_num_rows($result) === 1) {
        // cek password dari db
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION['dataUser'] = $row;
        }
        $role = $row['role'];
        if ($role === '1') {
            header('Location: Pages/Dashboard/index.php');
        } else {
            header('Location: Pages/userpages/index.php');
        }
    }

    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/styling/utils.css">
    <link rel="stylesheet" href="dist/styling/authStyle/main.css">
    <title>My barbershop</title>
</head>

<body>
    <div class="container mt-3">
        <div class="card">
            <img src="https://img.freepik.com/free-vector/barber-shop-label-font-sample_1284-39587.jpg?size=338&ext=jpg&ga=GA1.2.1063106472.1618554562" title="My barbershop" class="card-img">
            <div class="card-body">
                <div class="card-title">
                    Hello. Wellcome to <span class="card-sub-title">My Barbershop</span>
                </div>
                <?php if (isset($error)) : ?>
                    <div class='container'>
                        <p class='flash-msg text-center' style='
                                            color: red;
                                            font-size: 0.86rem;
                                            border: 1px solid;
                                        '>Username / Password belum terdaftar!</p>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="container mt-2">
                        <div class="input-group">
                            <input type="text" class="form-input" name="user" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-input mt-2" name="password" placeholder="Password">
                        </div>
                    </div>
                    <p class="card-text mt-1">Not have any Account ? <a href="Pages/Register/index.php">Register</a></p>
                    <button class="btn btn-primary mt-1" type="submit" name="login">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>