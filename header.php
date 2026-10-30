
<?php
$page_background_color = carbon_get_post_meta(
    get_queried_object_id(),
    'page_background_color'
);

if (!$page_background_color) {
    $page_background_color = '#FFFDE6';
}
?>

<style>
    body {
        background-color: <?php echo esc_attr($page_background_color); ?>;
    }
</style>





<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/frontend/styles/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover" />
    <title><?php bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>
<body>
