<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan List Testimoni.xls");
require '../../../backend/functions.php';
$sqlForData = "SELECT * FROM testimoni ORDER BY cid DESC";
$comments = query($sqlForData);

?>
<table class="table1 mt-1">
    <tr>
        <th>No</th>
        <th>Nama Pengirim</th>
        <th>Comment</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($comments as $comment) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $comment['from_user']; ?></td>
            <td><?= $comment['comment']; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>