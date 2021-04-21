<div id="main-sidebar">
    <div class="title-sidebar text-center">
        <h3>My barbers</h3>
    </div>
    <ul class="sidebar-menu">
        <?php foreach ($menus as $menu) : ?>
            <li class="menu-header mt-2"><?= $menu['nama_menu']; ?></li>
            <li class="sub-menu"><a href=<?= $menu['menu_link']; ?>><i class='<?= $menu['menu_icon']; ?>'></i> <?= $menu['nama_menu']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>