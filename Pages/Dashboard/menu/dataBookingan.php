<?php
$jmlDataPerHalaman = 10;
$jmlData = count(query("SELECT * FROM booking"));
$jmlHal = ceil($jmlData / $jmlDataPerHalaman);
$halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jmlDataPerHalaman * $halAktif) - $jmlDataPerHalaman;

$datasBooking = query("SELECT * FROM booking ORDER BY booking_id DESC LIMIT $awalData, $jmlDataPerHalaman");
?>


<table class="table1 mt-1">
    <tr style="background-color: skyblue;">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
    </tr>
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