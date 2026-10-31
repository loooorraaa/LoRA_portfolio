
<?php
$data = $args['data'];
js_log($data);

// TITEL
$title = $data['title'] ?? '';

// BILDER
$image_1 = $data['image_1'] ?? [];
$image_2 = $data['image_2'] ?? [];

// KONTAKTFORMULAR
$contact_form_shortcode = $data['contact_form_shortcode'] ?? '';
?>

<section data-module="contactform">

    <!-- TITEL -->
    <h2 class="contactform-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- BILD 1 -->
    <img
        class="contactform-image-1"
        src="<?= esc_url($image_1['src'] ?? '') ?>"
        alt="<?= esc_attr($image_1['alt'] ?? '') ?>"
    >


    <!-- BILD 2 -->
    <img
        class="contactform-image-2"
        src="<?= esc_url($image_2['src'] ?? '') ?>"
        alt="<?= esc_attr($image_2['alt'] ?? '') ?>"
    >


    <!-- KONTAKTFORMULAR -->
    <div class="contactform-form">

        <?php if (!empty($contact_form_shortcode)) : ?>

            <?= apply_shortcodes($contact_form_shortcode) ?>

        <?php endif; ?>

    </div>

</section>
