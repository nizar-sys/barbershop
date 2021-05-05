<?php
$jmlDataPerHalaman = 10;
$jmlData = count(query("SELECT * FROM booking"));
$jmlHal = ceil($jmlData / $jmlDataPerHalaman);
$halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jmlDataPerHalaman * $halAktif) - $jmlDataPerHalaman;

$hari = 7;

// proses untuk melakukan penghapusan data

$query = "DELETE FROM booking
          WHERE DATEDIFF(CURDATE(), tanggal) > $hari AND status = 'selesai'";
$hasil = mysqli_query($koneksi, $query);

$datasBooking = query("SELECT * FROM booking ORDER BY booking_id DESC LIMIT $awalData, $jmlDataPerHalaman");

if (isset($_POST['Orderstatus'])) {
    $status = $_POST['status'];
    $datasBooking = query("SELECT * FROM booking WHERE status = '$status' ORDER BY booking_id DESC LIMIT $awalData, $jmlDataPerHalaman");
}
?>
<form method="post" action="" id="form-status">
    <select name="status" id="status">
        <option value="">Lihat sesuai status</option>
        <option value="selesai">Selesai</option>
        <option value="belum selesai">Belum selesai</option>
    </select>
    <button type="submit" name="Orderstatus">Lihat</button>
</form>
<table class="table1 mt-1">
    <tr style="background-color: skyblue;">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
    </tr>
    <?php if ($jmlData > 0) : ?>
        <?php $i = 1; ?>
        <?php foreach ($datasBooking as $bookingan) : ?>
            <tr>
                <td data-label="No"><?= $i; ?></td>
                <td data-label="Nama Pembooking"><?= $bookingan['nama_pembooking']; ?></td>
                <td data-label="Tgl Booking"><?= $bookingan['tanggal_booking']; ?></td>
                <td data-label="Jam Booking"><?= $bookingan['jam_booking']; ?></td>
                <td data-label="Status"><?= $bookingan['status']; ?></td>
                <?php if ($bookingan['status'] == 'belum selesai') : ?>
                    <td class="d-flex" data-label="Aksi">
                        <form action="./laporan.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?= $bookingan['booking_id']; ?>">

                            <button class="btn btn-warning font-black" name="updateStatus">Selesaikan</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<?php if ($halAktif > 1) : ?>
    <a href="?halaman=<?= $halAktif - 1; ?>">&laquo; Prev</a>
<?php endif; ?>

<?php for ($i = 1; $i < $jmlHal; $i++) : ?>
    <?php if ($i == $halAktif) : ?>
        <a href="?halaman=<?= $i ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halAktif < $jmlHal) : ?>
    <a href="?halaman=<?= $halAktif + 1; ?>">Next &raquo;</a>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>