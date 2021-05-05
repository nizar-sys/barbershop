<?php session_start();
$nama = $_SESSION['dataUser']['username'];
$tanggal = $_GET['tanggal'];
$jam = $_GET['jam'];

require '../../backend/functions.php';
if (isset($_POST['konfirmasi'])) {
    $nama_pembooking = $_POST['nama'];
    $query = "INSERT INTO booking VALUES('', '$nama_pembooking', '$tanggal', '$jam', DEFAULT)";


    $result = mysqli_query($koneksi, $query);


    if (mysqli_affected_rows($koneksi) === 1) {
        echo "<script>
                alert('booking success');
                window.location.href = './index.php';
            </script>";
    } else {
        echo "<div class='container'><p class='flash-msg text-center' style='
        color: red;
        border: 1px solid;
    '>Gagal nge Booking!</p></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Barbershop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/styling/utils.css">
    <link rel="stylesheet" href="./userPages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Barbershop</label>
        <ul>
            <li><a class="active" href="">Home</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container konten-container">
        <h1 class="konten-title text-center"><?= $nama; ?>, Konfirmasi inputan Kamu </h1>
        <div class="header-confirm">
            <h1 class="confirmasi-msg">Kamu booking untuk tanggal <?= $tanggal; ?> dan Jam <?= $jam; ?></h1>
        </div>
        <div class="konten-form">
            <div class="container">
                <form action="" method="POST">
                    <div class="row">
                        <input type="hidden" class="mt-1 form-input" name="tanggal" id="tanggal" hidden>
                    </div>
                    <div class="row">
                        <input type="hidden" class="mt-1 form-input" name="jam" id="jam" placeholder="Jam booking" hidden>
                    </div>
                    <div class="row">
                        <input type="text" class="mt-1 form-input" name="nama" id="nama" placeholder="Nama..." required>
                    </div>
                    <div class="row btn-book ">
                        <button type="submit" name="konfirmasi" class="btn btn-primary">KONFIRMASI</button>
                    </div>
                </form>
                <a href="./index.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>