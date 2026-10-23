
<?php
$menus = get_menu_by_slug('main');
$legals = get_menu_by_slug('legals');
?>

<!-- Google Font: Source Code Pro -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet">

<footer data-layout="footer">

    <!-- Links: Datenschutz, Impressum und Copyright -->
    <div class="footer-legal">
        <nav aria-label="Rechtliche Informationen">
            <ul class="footer-list">
                <?php foreach ($legals as $legal) : ?>
                    <li>
                        <a
                            target="<?= esc_attr($legal['target'] ?? '_self') ?>"
                            href="<?= esc_url($legal['url']) ?>"
                        >
                            <?= esc_html($legal['title']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="footer-copyright">
                    © 2026 LoRA
                </li>
            </ul>
        </nav>
    </div>

  

<!-- Mitte: Instagram -->
<div class="footer-instagram">
    <span>Instagram</span>

    <a
        href="<?= esc_url(carbon_get_theme_option('instagram_url')) ?>"
        target="_blank"
        rel="noopener noreferrer"
    >
        @lora.portfolio
    </a>

</div>

    <!-- Rechts: Hauptnavigation -->
    <nav class="footer-main-nav" aria-label="Footer-Navigation">
        <ul class="footer-list">
            <?php foreach ($menus as $menu) : ?>
                <li>
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

</footer>





