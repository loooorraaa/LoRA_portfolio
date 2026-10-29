<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])

            // -> HERO STARTSEITE
            ->add_fields('hero_start', 'Hero Startseite', [
                Field::make('image', 'logo', 'Logo')->set_required(),
                Field::make('image', 'image_1', 'Bild 1')->set_required(),
                Field::make('image', 'image_2', 'Bild 2')->set_required(),
                Field::make('image', 'image_3', 'Bild 3')->set_required(),
                Field::make('image', 'image_4', 'Bild 4')->set_required(),
                Field::make('image', 'image_5', 'Bild 5')->set_required(),
            ])

            //-> HERO WORKSEITE
            ->add_fields('hero_works', 'Hero Workseite', [
                Field::make('image', 'logo', 'Logo')->set_required(),
                Field::make('image', 'image_1', 'Bild 1')->set_required(),
                Field::make('image', 'image_2', 'Bild 2')->set_required(),
                Field::make('image', 'image_3', 'Bild 3')->set_required(),
                Field::make('image', 'image_4', 'Bild 4')->set_required(),
            ])

            // -> HERO ABOUTME SEITE
             ->add_fields('hero_aboutme', 'Hero AboutMe Seite', [
                Field::make('image', 'logo', 'Logo')->set_required(),
                Field::make('image', 'image_1', 'Bild 1')->set_required(),
                Field::make('image', 'image_2', 'Bild 2')->set_required(),
                Field::make('image', 'image_3', 'Bild 3')->set_required(),
            ])

            // -> HERO CONTACTME SEITE
              ->add_fields('hero_contactme', 'Hero ContactMe Seite', [
                Field::make('image', 'logo', 'Logo')->set_required(),
                Field::make('image', 'image_1', 'Bild 1')->set_required(),
                Field::make('image', 'image_2', 'Bild 2')->set_required(),
            ])


            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules(): void {
    $modules = carbon_get_the_post_meta('modules');
    js_log('render_modules', $modules);

    if (empty($modules)) {
        return;
    }

    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image'], 'full');
                break;

            // -> HERO STARTSEITE
            case 'hero_start':
                $module['logo'] = get_media_by_id($module['logo'], 'full');

                for ($i = 1; $i <= 5; $i++) {
                    $key = 'image_' . $i;
                    $module[$key] = get_media_by_id($module[$key], 'full');
                }
                break;

            // -> HERO WORKSEITE
            case 'hero_works':
                $module['logo'] = get_media_by_id($module['logo'], 'full');
                
                for ($i = 1; $i <= 4; $i++) {
                    $key = 'image_' . $i;
                    $module[$key] = get_media_by_id($module[$key], 'full');
                }
                break;

            // -> HERO ABOUTME SEITE
            case 'hero_aboutme':
                $module['logo'] = get_media_by_id($module['logo'], 'full');

                for ($i = 1; $i <= 3; $i++) {
                    $key = 'image_' . $i;
                    $module[$key] = get_media_by_id($module[$key], 'full');
                }
                break;

            // -> HERO CONTACTME SEITE
            case 'hero_contactme':
                $module['logo'] = get_media_by_id($module['logo'], 'full');

                for ($i = 1; $i <= 2; $i++) {
                    $key = 'image_' . $i;
                    $module[$key] = get_media_by_id($module[$key], 'full');
                }
                break;


            // todo: add data modifications for modules here as a new case
        }

        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}