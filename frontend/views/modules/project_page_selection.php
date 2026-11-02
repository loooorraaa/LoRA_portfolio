<?php

$data = $args['data'];

$selected_category = $data['selected_category'];

// Projekte der ausgewählten Kategorie laden
$projects = get_posts([
    'post_type' => 'project',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'project_category',
            'field' => 'slug',
            'terms' => $selected_category,
        ],
    ],
]);

?>

<section data-module="project_page_selection">

    <div class="project-selection">

        <?php foreach ($projects as $project) : ?>

            <?php
            $projekt = get_project_by_id($project->ID);
            ?>

            <a class="project-selection-item"
               href="<?= esc_url(get_permalink($project->ID)) ?>">

                <?php if (!empty($projekt['hero_image']['src'])) : ?>
                    <img
                        src="<?= esc_url($projekt['hero_image']['src']) ?>"
                        alt="<?= esc_attr($projekt['hero_image']['alt'] ?? '') ?>"
                    >
                <?php endif; ?>

                <h2><?= esc_html($projekt['titel']) ?></h2>

                <div class="project-description">
                    <?= wp_kses_post(wpautop($projekt['project_description'])) ?>
                </div>

            </a>

        <?php endforeach; ?>

    </div>

</section>