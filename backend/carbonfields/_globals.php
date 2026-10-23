
<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Globale Einstellungen des Themes
Container::make('theme_options', 'Globales')
    ->add_fields([
        Field::make('text', 'instagram_url', 'Instagram-Link'),
    ]);

