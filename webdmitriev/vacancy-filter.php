<?php
// AJAX фильтр вакансий
function ajax_filter_vacancies() {
  $search = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
  $city   = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : '';
  $salary = isset($_POST['salary']) ? sanitize_text_field($_POST['salary']) : '';
  $title  = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';

  $tax_query = array('relation' => 'AND');
  $meta_query = array('relation' => 'AND');

  if (!empty($city)) {
    $tax_query[] = array(
      'taxonomy' => 'vacancy_city',
      'field'    => 'slug',
      'terms'    => $city,
    );
  }

  if (!empty($title)) {
    $tax_query[] = array(
      'taxonomy' => 'vacancy_title',
      'field'    => 'slug',
      'terms'    => $title,
    );
  }

  // Фильтрация по зарплате (ACF поле)
  if (!empty($salary)) {
    if ($salary === '200001-more') {
      // Для "200001 и более"
      $meta_query[] = array(
        'key' => 'salary', // название ACF поля
        'value' => 200000,
        'compare' => '>',
        'type' => 'NUMERIC'
      );
    } else {
      // Для диапазонов
      $salary_range = explode('-', $salary);
      $min_salary = intval($salary_range[0]);
      $max_salary = intval($salary_range[1]);
      
      $meta_query[] = array(
        'key' => 'salary', // название ACF поля
        'value' => array($min_salary, $max_salary),
        'compare' => 'BETWEEN',
        'type' => 'NUMERIC'
      );
    }
  }

  $args = array(
    'post_type'      => 'vacancies',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
  );

  if (!empty($search)) {
    $args['s'] = $search;
  }

  // Добавляем tax_query только если есть активные фильтры таксономий
  if (count($tax_query) > 1) {
    $args['tax_query'] = $tax_query;
  }

  // Добавляем meta_query только если есть фильтр по зарплате
  if (!empty($salary)) {
    $args['meta_query'] = $meta_query;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    echo '<div class="block-vacancies">';
      while ($query->have_posts()) : $query->the_post(); 
        $salary_value = get_field('salary'); // Получаем значение ACF поля
        ?>
        <div class="block-vacancy">
          <div class="block-vacancy__header df-fs-fe w-100p">
            <h3 class="vacancy__header-title"><?php the_title(); ?></h3>
            <?php if($salary_value): ?>
              <p class="vacancy__header-price"><?= number_format($salary_value, 0, '', ' '); ?> руб</p>
            <?php endif; ?>
            <div class="block-vacancy__header-details df-fs-fs w-100p">
              <?php if(get_field("address")): ?><span class="details-map icon-map-red"><?= get_field("address"); ?></span><?php endif; ?>
              <?php if(get_field("employment")): ?><span class="details-timer icon-timer-blue"><?= get_field("employment"); ?></span><?php endif; ?>
            </div>
          </div>
          <div class="block-vacancy__content" style="display: none;">
            <?php if(get_field("description")): ?><?= get_field("description"); ?><?php endif; ?>
            <?php if(get_field("btn_text")): ?><button class="btn <?= get_field("btn_popup"); ?>"><?= get_field("btn_text"); ?></button><?php endif; ?>
          </div>
        </div>
      <?php endwhile;
    echo '</div>';
  else :
    echo '<div class="not-found"><p>Вакансии не найдены.</p></div>';
  endif;

  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_filter_vacancies', 'ajax_filter_vacancies');
add_action('wp_ajax_nopriv_filter_vacancies', 'ajax_filter_vacancies');