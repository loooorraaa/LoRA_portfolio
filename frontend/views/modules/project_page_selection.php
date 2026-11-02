
<?php

$data = $args['data'];

$selected_category = $data['selected_category'] ?? '';


// AUSGEWÄHLTE PROJEKTE IN DER BACKEND-REIHENFOLGE HOLEN

$project_order = $data['project_order'] ?? [];

$project_ids = [];

if (is_array($project_order)) {

    foreach ($project_order as $item) {

        if (!empty($item['id'])) {
            $project_ids[] = (int) $item['id'];
        }

    }

}

$project_ids = array_values(array_unique($project_ids));


// PROJEKTE DER AUSGEWÄHLTEN KATEGORIE LADEN

$projects = [];

if (!empty($project_ids) && !empty($selected_category)) {

    $projects = get_posts([
        'post_type' => 'project',
        'posts_per_page' => -1,
        'post__in' => $project_ids,
        'orderby' => 'post__in',
        'tax_query' => [
            [
                'taxonomy' => 'project_category',
                'field' => 'slug',
                'terms' => $selected_category,
            ],
        ],
    ]);

}

?>

<div data-module="project_page_selection">

    <?php foreach ($projects as $project) : ?>

        <?php
        $projekt = get_project_by_id($project->ID);


        // VIDEO-WIEDERGABELISTE

        $video_playlist = $projekt['project_video_playlist'] ?? [];

        $video_playlist = is_array($video_playlist) ? $video_playlist : [];

        $videos = array_filter($video_playlist, function ($video) {
            return !empty($video['video_file']);
        });

        $has_video_playlist = !empty($videos);


        // PROJEKTLINK

        $project_link = $projekt['project_link'] ?? '';


        // EINDEUTIGE IDs FÜR JEDES PROJEKT

        $project_id = 'project-' . $project->ID;
        $popup_id = 'video-popup-' . $project->ID;
        $lightbox_id = 'video-lightbox-' . $project->ID;
        $video_id = 'lightbox-video-' . $project->ID;

        ?>

        <section
            class="project-page project-selection-item"
            id="<?= esc_attr($project_id) ?>"
        >

            <!-- PROJEKTINFORMATIONEN -->

            <div class="project-info">

                <h1 class="title">
                    <?= esc_html($projekt['titel']) ?>
                </h1>

                <div class="project-description">
                    <?= wp_kses_post(wpautop($projekt['project_description'])) ?>
                </div>

            </div>


            <!-- PROJEKTBILDER -->

            <div class="project-visuals">

                <!-- HERO-BILD -->

                <?php if (!empty($projekt['hero_image']['src'])) : ?>

                    <?php if ($has_video_playlist) : ?>

                        <button
                            type="button"
                            class="hero-image-button"
                            aria-label="Videogalerie öffnen"
                            aria-haspopup="dialog"
                            aria-controls="<?= esc_attr($popup_id) ?>"
                        >
                            <img
                                class="hero-image"
                                src="<?= esc_url($projekt['hero_image']['src']) ?>"
                                alt="<?= esc_attr($projekt['hero_image']['alt'] ?? '') ?>"
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
                                alt="<?= esc_attr($projekt['hero_image']['alt'] ?? '') ?>"
                            >
                        </a>

                    <?php else : ?>

                        <img
                            class="hero-image"
                            src="<?= esc_url($projekt['hero_image']['src']) ?>"
                            alt="<?= esc_attr($projekt['hero_image']['alt'] ?? '') ?>"
                        >

                    <?php endif; ?>

                <?php endif; ?>


                <!-- DREI BILDER UNTER DEM HERO -->

                <div class="project-thumbnails">

                    <?php for ($i = 1; $i <= 3; $i++) : ?>

                        <?php
                        $image = $projekt['project_image' . $i] ?? [];
                        ?>

                        <?php if (!empty($image['src'])) : ?>

                            <img
                                class="project-image<?= $i ?>"
                                src="<?= esc_url($image['src']) ?>"
                                alt="<?= esc_attr($image['alt'] ?? '') ?>"
                            >

                        <?php endif; ?>

                    <?php endfor; ?>

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


            <!-- VIDEO POPUP: ÜBERSICHT -->

            <?php if ($has_video_playlist) : ?>

                <div
                    class="video-popup"
                    id="<?= esc_attr($popup_id) ?>"
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

                            <?php
                            $video_url = wp_get_attachment_url($video['video_file']);
                            ?>

                            <?php if ($video_url) : ?>

                                <button
                                    type="button"
                                    class="video-preview"
                                    data-video="<?= esc_url($video_url) ?>"
                                    aria-label="Video abspielen"
                                >

                                    <video
                                        class="video-thumbnail"
                                        muted
                                        playsinline
                                        preload="auto"
                                    >
                                        <source src="<?= esc_url($video_url) ?>">
                                    </video>

                                    <span class="video-play-icon">▶</span>

                                </button>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- GROSSE VIDEOANSICHT -->

                <div
                    class="video-lightbox"
                    id="<?= esc_attr($lightbox_id) ?>"
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
                        id="<?= esc_attr($video_id) ?>"
                        controls
                        playsinline
                    ></video>

                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>

</div>


<!-- JAVASCRIPT: VIDEO POPUPS -->

<script>
(function () {

    document.querySelectorAll('[data-module="project_page_selection"] .project-selection-item').forEach(function (project) {

        const popup = project.querySelector('.video-popup');
        const openButton = project.querySelector('.hero-image-button');
        const closeButton = project.querySelector('.video-popup-close');

        const lightbox = project.querySelector('.video-lightbox');
        const lightboxVideo = project.querySelector('.video-lightbox video');
        const lightboxClose = project.querySelector('.video-lightbox-close');


        if (!popup || !lightbox || !lightboxVideo) return;


        // VIDEO-VORSCHAU BEI SEKUNDE 2 ANZEIGEN

        project.querySelectorAll('.video-thumbnail').forEach(function (video) {

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

        project.querySelectorAll('.video-preview').forEach(function (preview) {

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

        if (closeButton) {
            closeButton.addEventListener('click', closeVideoPopup);
        }

        if (lightboxClose) {
            lightboxClose.addEventListener('click', closeLightbox);
        }


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

})();
</script>
