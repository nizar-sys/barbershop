<?php
$sqlForData = "SELECT * FROM booking";
$datasBooking = query($sqlForData);
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
            <td class="d-flex">
                <a href="" class="btn btn-warning font-black">Edit</a> | <a href="" class="btn btn-danger font-black">Hapus</a>
            </td>
        </tr>
        <?= $i++; ?>
    <?php endforeach; ?>
</table>