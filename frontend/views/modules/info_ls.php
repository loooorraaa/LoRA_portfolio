
<?php
$title = $args['data']['title'];

// BILD 1
$image_1 = $args['data']['image_1'];
$image_url_1 = wp_get_attachment_image_url($image_1, 'full');

// BILD 2
$image_2 = $args['data']['image_2'];
$image_url_2 = $image_2 ? wp_get_attachment_image_url($image_2, 'full') : null;

// BESCHREIBUNG
$description = $args['data']['description'];

// VERLINKUNG
$link_text = $args['data']['link_text'];
$link_page = $args['data']['link_page'][0] ?? null;
$link_page_id = $link_page['id'] ?? null;
?>

<section data-module="info_ls">

    <!-- TITEL -->
    <h2 class="info-ls-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- BILDER -->
    <div class="info-ls-images">

        <!-- BILD 1 -->
        <?php if ($image_url_1) : ?>

            <img
                class="info-ls-image-1"
                src="<?= esc_url($image_url_1) ?>"
                alt="<?= esc_attr(get_post_meta($image_1, '_wp_attachment_image_alt', true)) ?>"
            >

        <?php endif; ?>


        <!-- BILD 2 -->
        <?php if ($image_url_2) : ?>

            <img
                class="info-ls-image-2"
                src="<?= esc_url($image_url_2) ?>"
                alt="<?= esc_attr(get_post_meta($image_2, '_wp_attachment_image_alt', true)) ?>"
            >

        <?php endif; ?>

    </div>


    <!-- BESCHREIBUNG -->
    <div class="info-ls-description">
        <?= wp_kses_post(wpautop($description)) ?>
    </div>


    <!-- VERLINKUNG -->
    <?php if ($link_page_id && $link_text) : ?>

        <a
            class="info-ls-link"
            href="<?= esc_url(get_permalink($link_page_id)) ?>"
        >
            <?= esc_html($link_text) ?>
        </a>

    <?php endif; ?>

</section>
