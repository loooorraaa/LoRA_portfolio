<?php
$title = $args['data']['title'];
$image_1 = $args['data']['image_1'];
$subline_1 = $args['data']['subline_1'];

$teaser_link_1 = $args['data']['teaser_link_1'][0] ?? null;
$project_id = $teaser_link_1['id'] ?? null;

$image_url = wp_get_attachment_image_url($image_1, 'full');
?>

<section data-module="somework">

    <h2><?= esc_html($title) ?></h2>

    <?php if ($image_url) : ?>

        <?php if ($project_id) : ?>
            <a href="<?= esc_url(get_permalink($project_id)) ?>">
        <?php endif; ?>

        <img
            src="<?= esc_url($image_url) ?>"
            alt="<?= esc_attr(get_post_meta($image_1, '_wp_attachment_image_alt', true)) ?>"
        >

        <?php if ($project_id) : ?>
            </a>
        <?php endif; ?>

    <?php endif; ?>

    <div class="subline">
        <?= wpautop($subline_1) ?>
    </div>

</section>