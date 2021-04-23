<?php
$jmlDataPerHalaman = 10;
$jmlData = count(query("SELECT * FROM booking"));
$jmlHal = ceil($jmlData / $jmlDataPerHalaman);
$halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jmlDataPerHalaman * $halAktif) - $jmlDataPerHalaman;

$datasUser = query("SELECT * FROM user ORDER BY uid DESC LIMIT $awalData, $jmlDataPerHalaman");
?>


<table class="table1 mt-1">
    <tr>
        <th>No</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($datasUser as $user) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $user['fullname']; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['role']; ?></td>
            <td>
                <a href="../aksi/crud/user.php?id=<?= $user['uid']; ?>" class="btn btn-warning font-black">Edit</a> <a href="../aksi/crud/userDelete.php?id=<?= $user['uid']; ?>" onclick="return confirm('yakin ?')" class="btn btn-danger font-black">Hapus</a>
            </td>
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