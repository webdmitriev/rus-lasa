<?php

add_action('wp_ajax_filter_posts', 'my_filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'my_filter_posts');

function my_filter_posts() {
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $date     = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';
    $search   = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
    ];

    // 📂 Категория
    if ($category) {
        $args['category_name'] = $category;
    }

    // 📅 Дата публикации
    if ($date) {
        $parts = explode('.', $date);
        if (count($parts) === 3) {
            $args['date_query'][] = [
                'year'  => intval($parts[2]),
                'month' => intval($parts[1]),
                'day'   => intval($parts[0]),
            ];
        }
    }

    // 🔍 Поиск
    if ($search) {
        $args['s'] = $search;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
      ob_start();
      while ($query->have_posts()) { $query->the_post(); ?>
        <div class="post-item">
          <div class="post-date">
              <div class="post-date__num"><?= get_the_date('j'); ?></div>
              <div class="post-date__month"><?= get_the_date('F'); ?></div>
              <div class="post-date__year"><?= get_the_date('Y'); ?></div>
          </div>
          <h3 class="post-title"><?php the_title(); ?></h3>
          <div class="post-excerpt"><?= get_field('excerpt', get_the_ID()); ?></div>
          <a href="<?php the_permalink(); ?>" class="post-link">Читать дальше</a>
        </div>
      <?php
      }
      wp_reset_postdata();
      $html = ob_get_clean();
    } else {
        $html = '<div class="not-found-posts"><p>Постов не найдено.</p></div>';
    }

    echo $html;
    wp_die();
}

// Подключаем JS и передаём admin_url
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('filter-script', get_template_directory_uri() . '/webdmitriev/assets/js/news-filter.js', ['jquery'], null, true);
    wp_localize_script('filter-script', 'ajaxurl', [
        'url' => admin_url('admin-ajax.php'),
    ]);
});
