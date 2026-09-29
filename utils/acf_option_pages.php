<?php
// wordpress admin panel options

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title' => 'Ustawienia szablonu',
    'menu_title' => 'Ustawienia szablonu',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));

  acf_add_options_page(array(
    'page_title' => 'Moduły',
    'menu_title' => 'Moduły',
    'menu_slug' => 'modules-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}