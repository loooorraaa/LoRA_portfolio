
<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="hero_project">

    <a href="<?= esc_url(home_url('/')) ?>">
        <img class="logo" src="<?= $data['logo']['src'] ?>" alt="<?= $data['logo']['alt'] ?>">
    </a>

    <h1 class="title"><?= esc_html($data['titel']) ?></h1>

</section>
