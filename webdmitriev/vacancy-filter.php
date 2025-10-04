<?php
// AJAX фильтр вакансий
function ajax_filter_vacancies() {
  $search = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
  $city   = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : '';
  $salary = isset($_POST['salary']) ? sanitize_text_field($_POST['salary']) : '';
  $title  = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';

  $tax_query = array('relation' => 'AND');

  if (!empty($city)) {
    $tax_query[] = array(
      'taxonomy' => 'vacancy_city',
      'field'    => 'slug',
      'terms'    => $city,
    );
  }

  if (!empty($salary)) {
    $tax_query[] = array(
      'taxonomy' => 'vacancy_salary',
      'field'    => 'slug',
      'terms'    => $salary,
    );
  }

  if (!empty($title)) {
    $tax_query[] = array(
      'taxonomy' => 'vacancy_title',
      'field'    => 'slug',
      'terms'    => $title,
    );
  }

  $args = array(
    'post_type'      => 'vacancies',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
  );

  if (!empty($search)) {
    $args['s'] = $search;
  }

  // Добавляем tax_query только если есть активные фильтры
  if (count($tax_query) > 1) {
    $args['tax_query'] = $tax_query;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    echo '<div class="block-vacancies">';
      while ($query->have_posts()) : $query->the_post(); ?>
        <div class="block-vacancy">
          <div class="block-vacancy__header df-fs-fe w-100p">
            <h3 class="vacancy__header-title"><?php the_title(); ?></h3>
            <?php if(get_field("price")): ?><p class="vacancy__header-price"><?= get_field("price")['0']->slug; ?> руб</p><?php endif; ?>
            <div class="block-vacancy__header-details df-fs-fs w-100p">
              <?php if(get_field("address")): ?><span class="details-map icon-map-red"><?= get_field("address"); ?></span><?php endif; ?>
              <?php if(get_field("employment")): ?><span class="details-timer icon-timer-blue"><?= get_field("employment"); ?></span><?php endif; ?>
            </div>
          </div>
          <div class="block-vacancy__content" style="display: none;">
            <?php if(get_field("description")): ?><?= get_field("description"); ?><?php endif; ?>
            <button class="btn">Оставить заявку</button>
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
