
<?php
$title = $args['data']['title'];

// BILD 1
$image_1 = $args['data']['image_1'];
$subline_1 = $args['data']['subline_1'];
$teaser_link_1 = $args['data']['teaser_link_1'][0] ?? null;
$project_id_1 = $teaser_link_1['id'] ?? null;
$image_url_1 = wp_get_attachment_image_url($image_1, 'full');

// BILD 2
$image_2 = $args['data']['image_2'];
$subline_2 = $args['data']['subline_2'];
$teaser_link_2 = $args['data']['teaser_link_2'][0] ?? null;
$project_id_2 = $teaser_link_2['id'] ?? null;
$image_url_2 = wp_get_attachment_image_url($image_2, 'full');

// BILD 3
$image_3 = $args['data']['image_3'];
$subline_3 = $args['data']['subline_3'];
$teaser_link_3 = $args['data']['teaser_link_3'][0] ?? null;
$project_id_3 = $teaser_link_3['id'] ?? null;
$image_url_3 = wp_get_attachment_image_url($image_3, 'full');
?>

<section data-module="somework">

    <h2 class="somework-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- BILD 1 -->

    <?php if ($image_url_1) : ?>

        <div class="somework-item somework-item--1">

            <?php if ($project_id_1) : ?>
                <a href="<?= esc_url(get_permalink($project_id_1)) ?>">
            <?php endif; ?>

                <img
                    src="<?= esc_url($image_url_1) ?>"
                    alt="<?= esc_attr(get_post_meta($image_1, '_wp_attachment_image_alt', true)) ?>"
                >

            <?php if ($project_id_1) : ?>
                </a>
            <?php endif; ?>

            <div class="somework-subline">
                <?= wp_kses_post(wpautop($subline_1)) ?>
            </div>

        </div>

    <?php endif; ?>


    <!-- BILD 2 -->

    <?php if ($image_url_2) : ?>

        <div class="somework-item somework-item--2">

            <div class="somework-subline">
                <?= wp_kses_post(wpautop($subline_2)) ?>
            </div>

            <?php if ($project_id_2) : ?>
                <a href="<?= esc_url(get_permalink($project_id_2)) ?>">
            <?php endif; ?>

                <img
                    src="<?= esc_url($image_url_2) ?>"
                    alt="<?= esc_attr(get_post_meta($image_2, '_wp_attachment_image_alt', true)) ?>"
                >

            <?php if ($project_id_2) : ?>
                </a>
            <?php endif; ?>

        </div>

    <?php endif; ?>


    <!-- BILD 3 -->

    <?php if ($image_url_3) : ?>

        <div class="somework-item somework-item--3">

            <?php if ($project_id_3) : ?>
                <a href="<?= esc_url(get_permalink($project_id_3)) ?>">
            <?php endif; ?>

                <img
                    src="<?= esc_url($image_url_3) ?>"
                    alt="<?= esc_attr(get_post_meta($image_3, '_wp_attachment_image_alt', true)) ?>"
                >

            <?php if ($project_id_3) : ?>
                </a>
            <?php endif; ?>

            <div class="somework-subline">
                <?= wp_kses_post(wpautop($subline_3)) ?>
            </div>

        </div>

    <?php endif; ?>

</section>
