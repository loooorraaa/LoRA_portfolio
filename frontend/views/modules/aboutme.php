
<?php
$data = $args['data'];
js_log($data);

// TITEL
$title = $data['title'] ?? '';

// BILD
$image_1 = $data['image_1'] ?? [];

// BESCHREIBUNG
$description = $data['description'] ?? '';
?>

<section data-module="aboutme">

    <!-- TITEL -->
    <h2 class="aboutme-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- BILD -->
    <img
        class="aboutme-image"
        src="<?= esc_url($image_1['src'] ?? '') ?>"
        alt="<?= esc_attr($image_1['alt'] ?? '') ?>"
    >


    <!-- BESCHREIBUNG -->
    <div class="aboutme-description">
        <?= wp_kses_post($description) ?>
    </div>

</section>
