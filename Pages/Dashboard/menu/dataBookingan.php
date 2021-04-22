<?php
$jmlDataPerHalaman = 10;
$jmlData = count(query("SELECT * FROM booking"));
$jmlHal = ceil($jmlData / $jmlDataPerHalaman);
$halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jmlDataPerHalaman * $halAktif) - $jmlDataPerHalaman;

$datasBooking = query("SELECT * FROM booking ORDER BY booking_id DESC LIMIT $awalData, $jmlDataPerHalaman");
?>


<table class="table1 mt-1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($datasBooking as $bookingan) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $bookingan['nama_pembooking']; ?></td>
            <td><?= $bookingan['tanggal_booking']; ?></td>
            <td><?= $bookingan['jam_booking']; ?></td>
            <td><?= $bookingan['status']; ?></td>
            <?php if ($bookingan['status'] == 'belum selesai') : ?>
                <td class="d-flex">
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