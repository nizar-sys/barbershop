<?php
session_start();
$nama = $_SESSION['dataUser']['fullname'];
require '../../backend/functions.php';
if (isset($_POST['sendComment'])) {
    $comment = $_POST['comment'];
    $uid = $_POST['uid'];
    $query = mysqli_query($koneksi, "INSERT INTO testimoni VALUES('', '$nama', '$comment', '$uid')");
}

$sqlComment = "SELECT * FROM testimoni";
$comments = query($sqlComment);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Barbershop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/styling/utils.css">
    <link rel="stylesheet" href="./userPages.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .uwuContainer {
            border: 2px solid #ccc;
            background-color: #eee;
            border-radius: 5px;
            padding: 16px;
            width: 400px;
            margin: 0 auto;
        }

        .uwuContainer::after {
            content: "";
            clear: both;
            display: table;
        }

        .uwuContainer img {
            float: left;
            margin-right: 20px;
            border-radius: 50%;
        }

        .uwuContainer span {
            font-size: 20px;
            margin-right: 15px;
        }

        @media (max-width: 500px) {
            .uwuContainer {
                text-align: center;
            }

            .uwuContainer img {
                margin: auto;
                float: none;
                display: block;
            }
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
    </style>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Barbershop</label>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./ulasan.php" class="active">Ulasan</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <?php foreach ($comments as $comment) : ?>
        <div class="uwuContainer">
            <p><span><i class="fas fa-user"></i><a href="./user.php?id=<?= $comment['id_user'] ?>"><?= $comment['from_user']; ?></a></span></p>
            <br>
            <p><i class="fas fa-comments"></i> <?= $comment['comment']; ?></p>
        </div>
        <br>
    <?php endforeach; ?>

    <form method="post" class="mt-5">
        <div class="uwuContainer bg-success">
            <div class="input-group">
                <input type="hidden" name="uid" id="uid" class="form-input" value="<?= $uid ?>">
            </div>
            <div class="input-group">
                <input type="text" name="name" id="name" class="form-input" value="From <?= $nama ?>" disabled>
            </div>
            <div class="input-group">
                <textarea name="comment" id="comment" placeholder="text..." cols="30" rows="10" class="form-input" required></textarea>
            </div>
            <button type="submit" name="sendComment" class="btn mt-1"><i class="fas fa-comments"></i></button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>