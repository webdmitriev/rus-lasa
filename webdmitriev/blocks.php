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

  $categories[] = array(
    'slug'  => 'block_news',
    'title' => __('Новостные блоки', 'webdmitriev'),
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

  // 14
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-14',
    'title'           => __('Block - 14'),
    'description'     => __('Новости'),
    'render_template' => 'webdmitriev/blocks/block-14.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-14.jpg">'
        )
      )
    )
  ));

  // 15
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-15',
    'title'           => __('Block - 15'),
    'description'     => __('Текст, картинка, кнопка'),
    'render_template' => 'webdmitriev/blocks/block-15.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-15.jpg">'
        )
      )
    )
  ));

  // 16
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-16',
    'title'           => __('Block - 16'),
    'description'     => __('Блок'),
    'render_template' => 'webdmitriev/blocks/block-16.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-16.jpg">'
        )
      )
    )
  ));

  // 17
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-17',
    'title'           => __('Block - 17'),
    'description'     => __('Новости - кастомные'),
    'render_template' => 'webdmitriev/blocks/block-17.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-17.jpg">'
        )
      )
    )
  ));

  // 18
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-18',
    'title'           => __('Block - 18'),
    'description'     => __('Заголовок, текст, кнопка'),
    'render_template' => 'webdmitriev/blocks/block-18.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-18.jpg">'
        )
      )
    )
  ));

  // 19
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-19',
    'title'           => __('Block - 19'),
    'description'     => __('Картинка, текст, кнопки'),
    'render_template' => 'webdmitriev/blocks/block-19.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-19.jpg">'
        )
      )
    )
  ));

  // 20
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-20',
    'title'           => __('Block - 20'),
    'description'     => __('Вакансии'),
    'render_template' => 'webdmitriev/blocks/block-20.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-20.jpg">'
        )
      )
    )
  ));

  // 21
  acf_register_block_type(array(
    'name'            => 'rus-lasa-block-21',
    'title'           => __('Block - 21'),
    'description'     => __('Магазин книг'),
    'render_template' => 'webdmitriev/blocks/block-21.php',
    'category'        => 'block_news',
    'icon'            => $icon,
    'keywords'        => array('block'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-21.jpg">'
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
    'acf/rus-lasa-block-14',
    'acf/rus-lasa-block-15',
    'acf/rus-lasa-block-16',
    'acf/rus-lasa-block-17',
    'acf/rus-lasa-block-18',
    'acf/rus-lasa-block-19',
    'acf/rus-lasa-block-20',
    'acf/rus-lasa-block-21',
  );
}, 10, 2);