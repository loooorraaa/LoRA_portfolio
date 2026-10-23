<?php


function get_project_by_id($id) {
    $titel = get_the_title($id);
    js_log($titel);

    return $titel;
}



    //js_log("infos projekt zurückgeben mit id: " . $id);
    // Implementation for fetching project data
