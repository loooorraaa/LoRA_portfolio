
<?php
// TEXT OBERHALB (OPTIONAL)
$text = $args['data']['text_above'] ?? null;

// TITEL
$title = $args['data']['title'];

// VERLINKUNG
$link_text = $args['data']['link_text'];
$link_page = $args['data']['link_page'][0] ?? null;
$link_page_id = $link_page['id'] ?? null;
?>

<section data-module="calltoaction">

    <!-- TEXT OBERHALB -->
    <?php if (!empty($text)) : ?>

        <div class="calltoaction-text">
            <?= esc_html($text) ?>
        </div>

    <?php endif; ?>


    <!-- TITEL -->
    <h2 class="calltoaction-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- VERLINKUNG -->
    <?php if ($link_page_id && $link_text) : ?>

        <a
            class="calltoaction-link"
            href="<?= esc_url(get_permalink($link_page_id)) ?>"
        >
            <?= esc_html($link_text) ?>
        </a>

    <?php endif; ?>

</section>
