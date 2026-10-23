
<?php

function get_project_by_id($id) {
    $titel = get_the_title($id);

    $hero_image_id = carbon_get_post_meta($id, 'project_hero_image');
    $hero_image = get_media_by_id(id: $hero_image_id);

    $project_image1_id = carbon_get_post_meta($id, 'project_image1');
    $project_image1 = get_media_by_id(id: $project_image1_id);

    $project_image2_id = carbon_get_post_meta($id, 'project_image2');
    $project_image2 = get_media_by_id(id: $project_image2_id);

    $project_image3_id = carbon_get_post_meta($id, 'project_image3');
    $project_image3 = get_media_by_id(id: $project_image3_id);

    $project_gallery_ids = carbon_get_post_meta($id, 'project_gallery');

    $project_description = carbon_get_post_meta($id, 'project_description');
    $project_link = carbon_get_post_meta($id, 'project_link');

    js_log($titel);
    js_log($hero_image);
    js_log($project_image1);
    js_log($project_image2);
    js_log($project_image3);
    js_log($project_gallery_ids);
    js_log($project_description);
    js_log($project_link);

    return $hero_image;
}




    //js_log("infos projekt zurückgeben mit id: " . $id);
    // Implementation for fetching project data
