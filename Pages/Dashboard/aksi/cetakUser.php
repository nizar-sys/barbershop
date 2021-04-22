<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Data User.xls");
require '../../../backend/functions.php';
$sqlForData = "SELECT * FROM user ORDER BY uid DESC";
$datasUser = query($sqlForData);

?>
<table class="table1 mt-1">
    <tr>
        <th>No</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Role</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($datasUser as $user) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $user['fullname']; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['role']; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>