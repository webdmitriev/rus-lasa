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

  $categories[] = array(
    'slug'  => 'block_content',
    'title' => __('Контент', 'webdmitriev'),
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
    'category'        => 'block_content',
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
    'category'        => 'block_content',
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

  // 05
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-05',
    'title'           => __('Block - 05'),
    'description'     => __('Картинка с авторами'),
    'render_template' => 'webdmitriev/blocks/block-05.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-05.jpg">'
        )
      )
    )
  ));

  // 06
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-06',
    'title'           => __('Block - 06'),
    'description'     => __('Фон картинка с логотипами и текстом'),
    'render_template' => 'webdmitriev/blocks/block-06.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-06.jpg">'
        )
      )
    )
  ));

  // 07
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-07',
    'title'           => __('Block - 07'),
    'description'     => __('Заглавный блок'),
    'render_template' => 'webdmitriev/blocks/block-07.php',
    'category'        => 'block_main',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-07.jpg">'
        )
      )
    )
  ));

  // 08
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-08',
    'title'           => __('Block - 08'),
    'description'     => __('Контент со слайдером'),
    'render_template' => 'webdmitriev/blocks/block-08.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-08.jpg">'
        )
      )
    )
  ));

  // 09
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-09',
    'title'           => __('Block - 09'),
    'description'     => __('Контент'),
    'render_template' => 'webdmitriev/blocks/block-09.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-09.jpg">'
        )
      )
    )
  ));

  // 10
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-10',
    'title'           => __('Block - 10'),
    'description'     => __('Слайдер с картинкой'),
    'render_template' => 'webdmitriev/blocks/block-10.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-10.jpg">'
        )
      )
    )
  ));

  // 11
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-11',
    'title'           => __('Block - 11'),
    'description'     => __('Блоки с картинками, текстом и кнопкой'),
    'render_template' => 'webdmitriev/blocks/block-11.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-11.jpg">'
        )
      )
    )
  ));

  // 12
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-12',
    'title'           => __('Block - 12'),
    'description'     => __('Политика обработки'),
    'render_template' => 'webdmitriev/blocks/block-12.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-12.jpg">'
        )
      )
    )
  ));

  // 13
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-13',
    'title'           => __('Block - 13'),
    'description'     => __('Текст'),
    'render_template' => 'webdmitriev/blocks/block-13.php',
    'category'        => 'block_content',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-13.jpg">'
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
    'acf/rus-lasa-block-05',
    'acf/rus-lasa-block-06',
    'acf/rus-lasa-block-07',
    'acf/rus-lasa-block-08',
    'acf/rus-lasa-block-09',
    'acf/rus-lasa-block-10',
    'acf/rus-lasa-block-11',
    'acf/rus-lasa-block-12',
    'acf/rus-lasa-block-13',
  );
}, 10, 2);