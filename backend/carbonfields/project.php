
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
        Field::make('rich_text', 'project_description', 'Projektbeschreibung'),

        Field::make('complex', 'project_video_playlist', 'Video-Wiedergabeliste')
            ->add_fields([
                Field::make('file', 'video_file', 'Videodatei')
                    ->set_type(['video']),
            ])
            ->set_layout('tabbed-horizontal'),

        Field::make('text', 'project_link', 'Projektlink')
            ->set_attribute('type', 'url'),
    ]);
