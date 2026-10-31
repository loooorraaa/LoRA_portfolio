
<?php

$projekt = get_project_by_id(get_the_ID());

js_log(get_the_ID());
js_log($projekt);


// VIDEO-WIEDERGABELISTE

$video_playlist = $projekt['project_video_playlist'] ?? [];

$video_playlist = is_array($video_playlist) ? $video_playlist : [];

$videos = array_filter($video_playlist, function ($video) {
    return !empty($video['video_file']);
});

$has_video_playlist = !empty($videos);


// PROJEKTLINK

$project_link = $projekt['project_link'] ?? '';

?>

<main class="project-page">

    <!-- TITEL UND BESCHREIBUNG -->

    <div class="project-info">

        <h1 class="title">
            <?= esc_html($projekt['titel']) ?>
        </h1>

        <div class="project-description">
            <?= wp_kses_post(wpautop($projekt['project_description'])) ?>
        </div>

    </div>


    <!-- BILDER -->

    <div class="project-visuals">

        <!-- HERO-BILD -->

        <?php if ($has_video_playlist) : ?>

            <button
                type="button"
                class="hero-image-button"
                aria-label="Videogalerie öffnen"
                aria-haspopup="dialog"
                aria-controls="video-popup"
            >
                <img
                    class="hero-image"
                    src="<?= esc_url($projekt['hero_image']['src']) ?>"
                    alt="<?= esc_attr($projekt['hero_image']['alt']) ?>"
                >
            </button>

        <?php elseif (!empty($project_link)) : ?>

            <a
                class="hero-image-link"
                href="<?= esc_url($project_link) ?>"
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


        <!-- DREI BILDER UNTER DEM HERO -->

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


    <!-- PROJEKTLINK -->

    <?php if (!empty($project_link)) : ?>

        <a
            class="project-link"
            href="<?= esc_url($project_link) ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            Projektlink
        </a>

    <?php endif; ?>

</main>


<!-- VIDEO POPUP: ÜBERSICHT -->

<?php if ($has_video_playlist) : ?>

    <div
        class="video-popup"
        id="video-popup"
        role="dialog"
        aria-modal="true"
        aria-label="Video-Wiedergabeliste"
        aria-hidden="true"
    >

        <button
            type="button"
            class="video-popup-close"
            aria-label="Popup schliessen"
        >
            ×
        </button>

        <div class="video-popup-content">

            <?php foreach ($videos as $video) : ?>

                <button
                    type="button"
                    class="video-preview"
                    data-video="<?= esc_url($video['video_file']) ?>"
                    aria-label="Video abspielen"
                >

                    <video
                        class="video-thumbnail"
                        muted
                        playsinline
                        preload="auto"
                    >
                        <source src="<?= esc_url($video['video_file']) ?>">
                    </video>

                    <span class="video-play-icon">▶</span>

                </button>

            <?php endforeach; ?>

        </div>

    </div>


    <!-- GROSSE VIDEOANSICHT -->

    <div
        class="video-lightbox"
        id="video-lightbox"
        aria-hidden="true"
    >

        <button
            type="button"
            class="video-lightbox-close"
            aria-label="Video schliessen"
        >
            ×
        </button>

        <video
            id="lightbox-video"
            controls
            playsinline
        ></video>

    </div>

<?php endif; ?>


<!-- JAVASCRIPT: VIDEO POPUP -->

<?php if ($has_video_playlist) : ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const popup = document.getElementById('video-popup');
    const openButton = document.querySelector('.hero-image-button');
    const closeButton = document.querySelector('.video-popup-close');

    const lightbox = document.getElementById('video-lightbox');
    const lightboxVideo = document.getElementById('lightbox-video');
    const lightboxClose = document.querySelector('.video-lightbox-close');


    if (!popup || !lightbox) return;


    // VIDEO-VORSCHAU BEI SEKUNDE 2 ANZEIGEN

    document.querySelectorAll('.video-thumbnail').forEach(function (video) {

        video.addEventListener('loadedmetadata', function () {

            video.currentTime = Math.min(
                2,
                Math.max(0, video.duration - 0.1)
            );

        }, { once: true });

        video.addEventListener('seeked', function () {

            video.pause();

        });

    });


    // VIDEOÜBERSICHT ÖFFNEN

    function openVideoPopup() {

        popup.classList.add('is-open');
        popup.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';

    }


    // VIDEOÜBERSICHT SCHLIESSEN

    function closeVideoPopup() {

        popup.classList.remove('is-open');
        popup.setAttribute('aria-hidden', 'true');

        document.body.style.overflow = '';

        if (openButton) {
            openButton.focus();
        }

    }


    // EINZELNES VIDEO GROSS ÖFFNEN

    document.querySelectorAll('.video-preview').forEach(function (preview) {

        preview.addEventListener('click', function () {

            const videoUrl = this.dataset.video;

            lightboxVideo.src = videoUrl;

            lightbox.classList.add('is-open');
            lightbox.setAttribute('aria-hidden', 'false');

            lightboxVideo.play();

        });

    });


    // GROSSE VIDEOANSICHT SCHLIESSEN

    function closeLightbox() {

        lightboxVideo.pause();
        lightboxVideo.removeAttribute('src');
        lightboxVideo.load();

        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');

    }


    // KLICK AUF HERO-BILD

    if (openButton) {
        openButton.addEventListener('click', openVideoPopup);
    }


    // KLICK AUF SCHLIESSEN

    closeButton.addEventListener('click', closeVideoPopup);

    lightboxClose.addEventListener('click', closeLightbox);


    // KLICK AUSSERHALB DES VIDEOS

    popup.addEventListener('click', function (event) {

        if (event.target === popup) {
            closeVideoPopup();
        }

    });

    lightbox.addEventListener('click', function (event) {

        if (event.target === lightbox) {
            closeLightbox();
        }

    });


    // ESCAPE-TASTE

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            if (lightbox.classList.contains('is-open')) {
                closeLightbox();
            } else if (popup.classList.contains('is-open')) {
                closeVideoPopup();
            }

        }

    });

});
</script>

<?php endif; ?>
