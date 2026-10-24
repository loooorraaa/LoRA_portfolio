
<?php

$projekt = get_project_by_id(get_the_ID());

js_log(get_the_ID());
js_log($projekt);

?>

<main class="project-page">

    <!-- Titel und Beschreibung -->
    <div class="project-info">

        <h1 class="title">
            <?= esc_html($projekt['titel']) ?>
        </h1>

        <div class="project-description">
            <?= wp_kses_post(wpautop($projekt['project_description'])) ?>
        </div>

    </div>

    <!-- Bilder -->
    <div class="project-visuals">

        <!-- Hero-Bild: öffnet den Projektlink beim Klick -->
        <?php if (!empty($projekt['project_link'])) : ?>

            <a
                class="hero-image-link"
                href="<?= esc_url($projekt['project_link']) ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img
                    class="hero-image"
                    src="<?= esc_url($projekt['hero_image']['src']) ?>"
                    alt="<?= esc_attr($projekt['hero_image']['alt']) ?>"
                >
            </a>

        <?php else : ?>

            <img
                class="hero-image"
                src="<?= esc_url($projekt['hero_image']['src']) ?>"
                alt="<?= esc_attr($projekt['hero_image']['alt']) ?>"
            >

        <?php endif; ?>

        <div class="project-thumbnails">

            <img
                class="project-image1"
                src="<?= esc_url($projekt['project_image1']['src']) ?>"
                alt="<?= esc_attr($projekt['project_image1']['alt']) ?>"
            >

            <img
                class="project-image2"
                src="<?= esc_url($projekt['project_image2']['src']) ?>"
                alt="<?= esc_attr($projekt['project_image2']['alt']) ?>"
            >

            <img
                class="project-image3"
                src="<?= esc_url($projekt['project_image3']['src']) ?>"
                alt="<?= esc_attr($projekt['project_image3']['alt']) ?>"
            >

        </div>

    </div>

    <!-- Projektlink -->
    <?php if (!empty($projekt['project_link'])) : ?>

        <a
            class="project-link"
            href="<?= esc_url($projekt['project_link']) ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            Projektlink
        </a>

    <?php endif; ?>

</main>
