
<?php

// Globale Informationen aus Carbon Fields auslesen

function get_globals_logo() {
    $logo_id = carbon_get_theme_option('site_logo');
    $logo = get_media_by_id(id: $logo_id);

    js_log($logo);

    return $logo;
}

function get_globals_instagram() {
    $instagram = carbon_get_theme_option('instagram_url');

    js_log($instagram);

    return $instagram;
}