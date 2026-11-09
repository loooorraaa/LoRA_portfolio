<?php
$data = $args['data'];
js_log($data);

// TITEL
$title = $data['title'] ?? '';

// BILD
$image_1 = $data['image_1'] ?? [];

// BESCHREIBUNG
$description = $data['description'] ?? '';

// VIDEO
$video = $data['video'] ?? '';
?>

<section data-module="aboutme">

    <!-- TITEL -->
    <h2 class="aboutme-title">
        <?= esc_html($title) ?>
    </h2>


    <!-- BILD MIT VIDEO-POPUP -->
    <?php if (!empty($video)) : ?>

        <button
            class="aboutme-video-trigger"
            type="button"
            aria-label="Video abspielen"
        >
            <img
                class="aboutme-image"
                src="<?= esc_url($image_1['src'] ?? '') ?>"
                alt="<?= esc_attr($image_1['alt'] ?? '') ?>"
            >
        </button>

        <!-- VIDEO POPUP -->
        <div class="aboutme-video-popup">

            <button
                class="aboutme-video-close"
                type="button"
                aria-label="Video schliessen"
            >
                ×
            </button>

            <video
                class="aboutme-video-player"
                controls
                playsinline
                preload="metadata"
            >
                <source src="<?= esc_url($video) ?>" type="video/mp4">
                Dein Browser unterstützt dieses Video nicht.
            </video>

        </div>

    <?php else : ?>

        <img
            class="aboutme-image"
            src="<?= esc_url($image_1['src'] ?? '') ?>"
            alt="<?= esc_attr($image_1['alt'] ?? '') ?>"
        >

    <?php endif; ?>


    <!-- BESCHREIBUNG -->
    <div class="aboutme-description">
        <?= wp_kses_post(wpautop($description)) ?>
    </div>

</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const modules = document.querySelectorAll('[data-module="aboutme"]');

    modules.forEach(function (module) {

        const trigger = module.querySelector('.aboutme-video-trigger');
        const popup = module.querySelector('.aboutme-video-popup');
        const close = module.querySelector('.aboutme-video-close');
        const video = module.querySelector('.aboutme-video-player');

        if (!trigger || !popup || !close || !video) return;

        // VIDEO ÖFFNEN
        trigger.addEventListener('click', function () {
            popup.classList.add('is-open');
            document.body.style.overflow = 'hidden';

            video.play().catch(function () {});
        });

        // VIDEO SCHLIESSEN
        function closeVideo() {
            popup.classList.remove('is-open');
            video.pause();
            video.currentTime = 0;
            document.body.style.overflow = '';
        }

        close.addEventListener('click', closeVideo);

        // KLICK AUSSERHALB DES VIDEOS
        popup.addEventListener('click', function (event) {
            if (event.target === popup) {
                closeVideo();
            }
        });

        // ESC-TASTE
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && popup.classList.contains('is-open')) {
                closeVideo();
            }
        });

    });

});
</script>