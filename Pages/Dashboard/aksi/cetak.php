<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Data Bookingan.xls");
require '../../../backend/functions.php';
$sqlForData = "SELECT * FROM booking ORDER BY booking_id DESC";
$datasBooking = query($sqlForData);

?>
<table class="table1 mt-1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Status</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($datasBooking as $bookingan) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $bookingan['nama_pembooking']; ?></td>
            <td><?= $bookingan['tanggal_booking']; ?></td>
            <td><?= $bookingan['jam_booking']; ?></td>
            <td><?= $bookingan['status']; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>