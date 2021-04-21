<?php
require '../../backend/functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<div class='container'><p class='flash-msg text-center' style='
        color: green;
        border: 1px solid;
    '>Berhasil di registrasi!</p></div>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/styling/utils.css">
    <link rel="stylesheet" href="../../dist/styling/authStyle/main.css">
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
                <div class="container mt-2">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-input mt" name="username" id="user" placeholder="New Username" required>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-input mt-2" name="fullname" id="fullname" placeholder="New Fullname" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-input mt-2" name="password1" id="password1" placeholder="New Password" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-input mt-2" name="password2" id="password2" placeholder="Confirm Password" required>
                        </div>
                </div>
                <p class="card-text mt-1">Have Account ? <a href="../../index.php">Login</a></p>
                <button class="btn btn-primary mt-1" type="submit" name="register">REGISTER</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>