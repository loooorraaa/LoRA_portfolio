<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="hero_contactme">
    <img class="logo" src="<?= $data['logo']['src'] ?>" alt="<?= $data['logo']['alt'] ?>">
    <img class="image1" src="<?= $data['image_1']['src'] ?>" alt="<?= $data['image_1']['alt'] ?>">
    <img class="image2" src="<?= $data['image_2']['src'] ?>" alt="<?= $data['image_2']['alt'] ?>">
    
</section>