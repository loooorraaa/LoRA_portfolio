 
 

<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'project_hero_image', 'Hero Projektbild')->set_required( true ),
        Field::make('image', 'project_image1', 'Erstes Projektbild')->set_required( true ),
        Field::make('image', 'project_image2', 'Zweites Projektbild')->set_required( true ),
        Field::make('image', 'project_image3', 'Drittes Projektbild')->set_required( true ),
        Field::make('media_gallery', 'project_gallery', 'Projekt Galerie'),
        Field::make('textarea', 'project_description', 'Projektbeschreibung'),
        Field::make('text', 'project_link', 'Projektlink')
            ->set_attribute('type', 'url'),
    ]);


