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
            <td class="d-flex">
                <a href="../aksi/crud/user.php?id=<?= $user['uid']; ?>" class="btn btn-warning font-black">Edit</a> | <p class="btn btn-danger font-black hapus" id="<?= $user['uid']; ?>">Hapus</p>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // import Swal from 'sweetalert2';
    // // CommonJS
    $('.hapus').on('click', (e) => {
        let id = e.target.id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    `Your Account has been deleted.`,
                    'success'
                )
                window.location.replace(`../aksi/crud/userDelete.php?id=${id}`);
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your Account is safe :)',
                    'error'
                )
            }
        })

    });
</script>