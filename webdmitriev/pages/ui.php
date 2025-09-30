<?php
// Создаем одну страницу в меню
function create_custom_page(){
  $page_title = 'UI + Настройки темы';
  $menu_title = 'UI';
  $capability = 'read';
  $slug = 'custom_page_content';
  $callback = 'custom_page_content';
  $icon = 'dashicons-admin-customizer'; // можно заменить на свой svg через base64
  $position = 3;

  add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
}
add_action( 'admin_menu', 'create_custom_page' );

// Контент объединенной страницы
function custom_page_content(){
  ?>
  <div class="wrap">
    <h1>UI + Настройки темы</h1>

    <!-- Вставляем UI страницу -->
    <div style="margin-bottom:40px; padding:20px; background:#fff; border:1px solid #ddd; border-radius:6px;">
      <?php require get_template_directory() . '/webdmitriev/pages/ui-page.php'; ?>
    </div>

    <!-- Вставляем настройки темы -->
    <div style="padding:20px; background:#fff; border:1px solid #ddd; border-radius:6px;">
      <h2>Настройки темы</h2>
      <form method="post" action="options.php">
        <?php
          settings_fields( 'my_theme_settings_group' );
          do_settings_sections( 'my_theme_settings' );
          submit_button();
        ?>
      </form>
    </div>
  </div>
  <?php
}

// Регистрируем настройки (остается без изменений)
function my_theme_register_settings() {
  register_setting( 'my_theme_settings_group', 'my_theme_accent_color' );
  register_setting( 'my_theme_settings_group', 'my_theme_color_choice' );

  add_settings_section( 'my_theme_color_section', 'Цвета темы', 'my_theme_color_section_callback', 'my_theme_settings' );

  add_settings_field( 'my_theme_color_choice_field', 'Выбор цвета', 'my_theme_color_choice_callback', 'my_theme_settings', 'my_theme_color_section' );
  add_settings_field( 'my_theme_custom_color_field', 'Свой цвет', 'my_theme_custom_color_callback', 'my_theme_settings', 'my_theme_color_section' );
}
add_action( 'admin_init', 'my_theme_register_settings' );
