<?php

function get_project_by_id(int $id): array {
    // Daten aus dem Backend holen

    $titel = get_the_title($id);

    $hero_image_id = carbon_get_post_meta($id, 'project_hero_image');
    $hero_image = get_media_by_id(id: $hero_image_id);

    $project_image1_id = carbon_get_post_meta($id, 'project_image1');
    $project_image1 = get_media_by_id(id: $project_image1_id);

    $project_image2_id = carbon_get_post_meta($id, 'project_image2');
    $project_image2 = get_media_by_id(id: $project_image2_id);

    $project_image3_id = carbon_get_post_meta($id, 'project_image3');
    $project_image3 = get_media_by_id(id: $project_image3_id);

    // Galerie: mehrere Medien-IDs zurückgeben
    $project_gallery = carbon_get_post_meta($id, 'project_gallery');

    // Projektbeschreibung
    $project_description = carbon_get_post_meta($id, 'project_description');

    // Video-Wiedergabeliste
    $project_video_playlist = carbon_get_post_meta($id, 'project_video_playlist');

    // Projektlink
    $project_link = carbon_get_post_meta($id, 'project_link');

    // Daten zurückgeben
    return [
        'titel' => $titel,
        'hero_image' => $hero_image,
        'project_image1' => $project_image1,
        'project_image2' => $project_image2,
        'project_image3' => $project_image3,
        'project_gallery' => $project_gallery,
        'project_description' => $project_description,
        'project_video_playlist' => $project_video_playlist,
        'project_link' => $project_link,
    ];
}