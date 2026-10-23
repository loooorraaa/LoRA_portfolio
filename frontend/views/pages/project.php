
<?php

$projekt = get_project_by_id(get_the_ID());

js_log(get_the_ID());
js_log($projekt);

?>

<main>
    <h1>Project</h1>
    <h1><?= $projekt['titel'] ?></h1>
    <img src="<?= $projekt['hero_image']['src'] ?>" alt="<?= $projekt['hero_image']['alt'] ?>">
    <img src="<?= $projekt['project_image1']['src'] ?>" alt="<?= $projekt['project_image1']['alt'] ?>">
    <img src="<?= $projekt['project_image2']['src'] ?>" alt="<?= $projekt['project_image2']['alt'] ?>">
    <img src="<?= $projekt['project_image3']['src'] ?>" alt="<?= $projekt['project_image3']['alt'] ?>">
    <p><?= $projekt['project_description'] ?></p>
    <a href="<?= $projekt['project_link'] ?>">Projektlink</a>   
</main>

    