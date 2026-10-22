<?php
$menus = get_menu_by_slug('main');
$legals = get_menu_by_slug('legals');
?>


<footer data-layout="footer">
    <mark>hier kommt der footer</mark>



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




   <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($legals as $legal) : ?>
                <li class="nav-item">
                    <a target="<?= $legal['target'] ?>"
                       href="<?= $legal['url'] ?>">
                        <?= $legal['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>


 </footer>




