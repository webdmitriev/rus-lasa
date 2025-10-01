<?php


/*
 * Remove admin bar (front page)
 */
add_filter('show_admin_bar', '__return_false');


/*
 * wpcf7
 */
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Register menu
 */
function webdmitriev_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => esc_html__('Header Menu', 'webdmitriev'),
      'footer-menu' => esc_html__('Footer Menu', 'webdmitriev'),
      'mobile-menu' => esc_html__('Mobile Menu', 'webdmitriev'),
      'lang-menu' => esc_html__('Lang Menu', 'webdmitriev'),
    )
  );
}
add_action('after_setup_theme', 'webdmitriev_register_menus');


/**
 * Options page
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'Настройки',
    'menu_title' => 'Настройки',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'update_button' => __('Обновить', 'acf'),
    'redirect' => false
  ));
}


/**
 * Add css, js, fonts - for page-custom.php
 */
function webdmitriev_scripts() {
  wp_enqueue_style('webdmitriev-css', get_template_directory_uri() . '/webdmitriev/assets/css/app.min.css', array(), '1.0.0');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/webdmitriev/assets/js/jquery-3.6.1.min.js', false, null, false);
  wp_enqueue_script('jquery');

  wp_enqueue_script('webdmitriev-app', get_template_directory_uri() . '/webdmitriev/assets/js/app.min.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'webdmitriev_scripts');