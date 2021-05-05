<?php session_start();
if($_SESSION['login'] === false){
    header('Location: ../../index.php');
}
$nama = $_SESSION['dataUser']['username'];
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
            <li><a href="./ulasan.php">Ulasan</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container konten-container">
        <h1 class="konten-title text-center">Hi <?= $nama; ?> Pilih waktu Booking</h1>
        <div class="konten-form">
            <div class="container">
                <form action="./konfirmasiBooking.php" method="GET" id="form">
                    <div class="row">
                        <input type="date" class="mt-1 form-input" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="row" id="form-jam">
                        <select name="jam" id="jam" style="width: 100%; height: 60px;" required>
                            <option value="">Pilh Jam Booking</option>
                            <option value="7:00 - 9:00">7:00 - 9:00</option>
                            <option value="9:00 - 12:00">9:00 - 12:00</option>
                            <option value="12:00 - 14:00">12:00 - 14:00</option>
                            <option value="15:00 - 16:00">15:00 - 16:00</option>
                        </select>
                    </div>
                    <div class="row btn-book mt-5">
                        <button name="booking" type="submit" class="btn btn-primary">BOOKING</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>