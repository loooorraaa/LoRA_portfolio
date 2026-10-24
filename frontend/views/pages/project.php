<?php

$projekt = get_project_by_id(get_the_ID());

js_log(get_the_ID());
js_log($projekt);

?>

<main>
    <h1 class="title"><?= $projekt['titel'] ?></h1>
    
    <div class="project-heroimage">
        <img class="hero-image" src="<?= $projekt['hero_image']['src'] ?>" alt="<?= $projekt['hero_image']['alt'] ?>">
        
        <div class="project-thumbnails">
            <img class="project-image1" src="<?= $projekt['project_image1']['src'] ?>" alt="<?= $projekt['project_image1']['alt'] ?>">
            <img class="project-image2" src="<?= $projekt['project_image2']['src'] ?>" alt="<?= $projekt['project_image2']['alt'] ?>">
            <img class="project-image3" src="<?= $projekt['project_image3']['src'] ?>" alt="<?= $projekt['project_image3']['alt'] ?>">
        </div>
    </div>

    <p class="project-description"><?= $projekt['project_description'] ?></p>
    <a class="project-link" href="<?= $projekt['project_link'] ?>">Projektlink</a>   
</main>



    