<?php

/**
 * Conference block categories
 */
add_filter('block_categories_all', function($categories, $post) {
  $categories[] = array(
    'slug'  => 'block_main',
    'title' => __('Заглавные блоки', 'webdmitriev'),
    'icon'  => 'wordpress',
  );

  $categories[] = array(
    'slug'  => 'block_title',
    'title' => __('Заголовки', 'webdmitriev'),
    'icon'  => 'wordpress',
  );

  return $categories;
}, 10, 2);

add_action('acf/init', function() {

  $icon = file_get_contents( get_template_directory() . '/webdmitriev/images/icon.svg' );
  $image = get_template_directory_uri() . '/webdmitriev/images/';

  // 01
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-01',
    'title'           => __('Block - 01'),
    'description'     => __('Главная баннер'),
    'render_template' => 'webdmitriev/blocks/block-01.php',
    'category'        => 'block_main',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
        )
      )
    )
  ));

  // 02
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-02',
    'title'           => __('Block - 02'),
    'description'     => __('Текст'),
    'render_template' => 'webdmitriev/blocks/block-02.php',
    'category'        => 'block_main',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-02.jpg">'
        )
      )
    )
  ));

  // 03
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-03',
    'title'           => __('Block - 03'),
    'description'     => __('Текст'),
    'render_template' => 'webdmitriev/blocks/block-03.php',
    'category'        => 'block_main',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-03.jpg">'
        )
      )
    )
  ));

  // 04
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-04',
    'title'           => __('Block - 04'),
    'description'     => __('Заголовок'),
    'render_template' => 'webdmitriev/blocks/block-04.php',
    'category'        => 'block_title',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-04.jpg">'
        )
      )
    )
  ));

});

add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
  return array(
    'acf/rus-lasa-block-01',
    'acf/rus-lasa-block-02',
    'acf/rus-lasa-block-03',
    'acf/rus-lasa-block-04',
  );
}, 10, 2);