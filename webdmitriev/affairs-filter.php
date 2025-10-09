<?php
// AJAX фильтр вакансий
function ajax_filter_affairs() {
  $search = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
  $cat    = isset($_POST['categories']) ? sanitize_text_field($_POST['categories']) : '';

  $tax_query = array('relation' => 'AND');

  if (!empty($cat)) {
    $tax_query[] = array(
      'taxonomy' => 'affairs_categories',
      'field'    => 'slug',
      'terms'    => $cat,
    );
  }

  $args = array(
    'post_type'      => 'affairs',
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
    echo '<div class="www">';
      while ($query->have_posts()) : $query->the_post(); ?>
        <div class="www">
          <div class="www">
            <h3 class="www"><?php the_title(); ?></h3>
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
add_action('wp_ajax_filter_affairs', 'ajax_filter_affairs');
add_action('wp_ajax_nopriv_filter_affairs', 'ajax_filter_affairs');
