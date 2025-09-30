<?php

// Описание секции
function my_theme_color_section_callback() {
  echo '<p>Выберите один из стандартных цветов или задайте свой.</p>';
}

// HTML для выбора типа цвета (радиокнопки)
function my_theme_color_choice_callback() {
  $current_choice = get_option( 'my_theme_color_choice', 'custom' );
  $color1 = '#25797E';
  $color2 = '#d78a48';
  $custom_color = get_option( 'my_theme_accent_color', '#21759b' );

  $active_color = $custom_color;
  if ($current_choice === 'color1') $active_color = $color1;
  if ($current_choice === 'color2') $active_color = $color2;
  ?>

  <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 15px; flex-wrap: wrap;">
    <!-- Стандартный цвет 1 -->
    <label style="display: flex; align-items: center; gap: 5px; margin-bottom: 10px;">
      <input type="radio" name="my_theme_color_choice" value="color1" <?php checked( $current_choice, 'color1' ); ?> />
      <span style="display: inline-block; width: 30px; height: 30px; background-color: <?php echo $color1; ?>; border: 2px solid #ddd; border-radius: 4px;"></span>
      <span>Зеленый (#25797E)</span>
    </label>

    <!-- Стандартный цвет 2 -->
    <label style="display: flex; align-items: center; gap: 5px; margin-bottom: 10px;">
      <input type="radio" name="my_theme_color_choice" value="color2" <?php checked( $current_choice, 'color2' ); ?> />
      <span style="display: inline-block; width: 30px; height: 30px; background-color: <?php echo $color2; ?>; border: 2px solid #ddd; border-radius: 4px;"></span>
      <span>Оранжевый (#d78a48)</span>
    </label>

    <!-- Свой цвет -->
    <label style="display: flex; align-items: center; gap: 5px; margin-bottom: 10px;">
      <input type="radio" name="my_theme_color_choice" value="custom" <?php checked( $current_choice, 'custom' ); ?> />
      <span style="display: inline-block; width: 30px; height: 30px; background-color: <?php echo $custom_color; ?>; border: 2px solid #ddd; border-radius: 4px;"></span>
      <span>Свой цвет</span>
    </label>
  </div>

  <div style="background: #f0f0f0; padding: 10px; border-radius: 4px; margin-top: 10px;">
    <strong>Текущий активный цвет:</strong>
    <span style="color: <?php echo $active_color; ?>; font-weight: bold;"><?php echo $active_color; ?></span>
  </div>
  <?php
}

// HTML для поля выбора кастомного цвета
function my_theme_custom_color_callback() {
  $current_choice = get_option( 'my_theme_color_choice', 'custom' );
  $custom_color = get_option( 'my_theme_accent_color', '#21759b' );

  // Определяем, показывать ли поле (только если выбран "custom")
  $is_custom_selected = ($current_choice === 'custom');
  $display_style = $is_custom_selected ? 'block' : 'none';
  ?>

  <div id="custom-color-field-wrapper" style="display: <?php echo $display_style; ?>; padding: 15px; background: #f9f9f9; border-radius: 4px; border-left: 4px solid #2271b1; margin-top: 10px;">
    <input type="color" name="my_theme_accent_color" value="<?php echo esc_attr( $custom_color ); ?>" />
    <span style="margin-left: 10px;">Выберите свой цвет</span>
    <p class="description">Это поле активно только когда выбран вариант "Свой цвет"</p>
  </div>

  <script>
    jQuery(document).ready(function($) {
      function toggleCustomColorField() {
        var isCustom = $('input[name="my_theme_color_choice"]:checked').val() === 'custom';
        if (isCustom) {
          $('#custom-color-field-wrapper').slideDown(300);
        } else {
          $('#custom-color-field-wrapper').slideUp(300);
        }
      }

      // При загрузке страницы
      toggleCustomColorField();

      // При изменении выбора радиокнопок
      $('input[name="my_theme_color_choice"]').change(function() {
        toggleCustomColorField();
      });
    });
  </script>
  <?php
}

// Функция для осветления цвета на 10%
function my_theme_lighten_color($hex, $percent = 10) {
  // Убеждаемся, что процент в пределах 0-100
  $percent = max(0, min(100, $percent));

  // Удаляем # из начала, если есть
  $hex = str_replace('#', '', $hex);

  // Если короткая запись цвета (например, #ABC), расширяем до полной (#AABBCC)
  if (strlen($hex) == 3) {
      $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
  }

  // Проверяем, что цвет в правильном формате
  if (strlen($hex) != 6) {
      return '#' . $hex; // Возвращаем как есть, если формат неправильный
  }

  // Разбиваем на RGB компоненты
  $r = hexdec(substr($hex, 0, 2));
  $g = hexdec(substr($hex, 2, 2));
  $b = hexdec(substr($hex, 4, 2));

  // Осветляем каждый компонент
  $r = min(255, round($r + (255 - $r) * ($percent / 100)));
  $g = min(255, round($g + (255 - $g) * ($percent / 100)));
  $b = min(255, round($b + (255 - $b) * ($percent / 100)));

  // Преобразуем обратно в HEX и форматируем
  $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
  $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
  $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

  return '#' . $r_hex . $g_hex . $b_hex;
}

// Динамически добавляем CSS в <head>
function my_theme_dynamic_css() {
  $color_choice = get_option('my_theme_color_choice', 'custom');
  $accent_color = get_option('my_theme_accent_color', '#21759b');

  if ($color_choice === 'color1') {
    $accent_color = '#25797E';
  } elseif ($color_choice === 'color2') {
    $accent_color = '#d78a48';
  }

  // Создаем осветленную версию цвета
  $accent_color_light = my_theme_lighten_color($accent_color, 20);
  ?>
  <style type="text/css">
    :root {
      --accent-color: <?php echo $accent_color; ?>;
      --accent-color-light: <?php echo $accent_color_light; ?>;
    }
  </style>
  <?php
}
add_action('wp_head', 'my_theme_dynamic_css');