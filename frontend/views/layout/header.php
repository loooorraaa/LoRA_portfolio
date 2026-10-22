<?php
$menus = get_menu_by_slug('main');
?>



<header data-layout="header">
    <mark>hier kommt der header</mark>

    

    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menus as $menu) : ?>
                <li class="nav-item">
                    <a target="<?= $menu['target'] ?>"
                       href="<?= $menu['url'] ?>">
                        <?= $menu['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

