   <?php
   register_taxonomy(
     'person_department',
     ['person'],
     [
       'label' => 'Abteilung',
       'labels' => [
         'name' => 'Abteilungen',
         'singular_name' => 'Abteilung',
         'menu_name' => 'Abteilungen',
         'all_items' => 'Alle Abteilungen',
         'edit_item' => 'Abteilung bearbeiten',
         'view_item' => 'Abteilung ansehen',
         'update_item' => 'Abteilung updaten',
         'add_new_item' => 'Neue Abteilung hinzufügen',
       ],
       'public' => true,
       'show_in_rest' => true,
       'show_in_nav_menus' => true,
       'show_admin_column' => true,
       'query_var' => true,
       'hierarchical' => true,
       'rewrite' => ['slug' => 'abteilung'],
     ],
   );