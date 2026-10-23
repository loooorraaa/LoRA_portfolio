
<?php
$menus = get_menu_by_slug('main');
$logo = get_globals_logo();
?>

<!-- Google Font: Source Code Pro -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet">

<header data-layout="header">

    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menus as $menu) : ?>
                <li class="nav-item">
                    <a
                        target="<?= esc_attr($menu['target'] ?? '_self') ?>"
                        href="<?= esc_url($menu['url']) ?>"
                    >
                        <?= esc_html($menu['title']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

</header>


