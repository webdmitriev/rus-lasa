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
        echo '<div class="vacancy-list">';
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="vacancy-item">
                <h3><?php the_title(); ?></h3>
                <div><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>">Подробнее</a>
            </div>
        <?php endwhile;
        echo '</div>';
    else :
        echo '<p>Вакансии не найдены.</p>';
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_filter_vacancies', 'ajax_filter_vacancies');
add_action('wp_ajax_nopriv_filter_vacancies', 'ajax_filter_vacancies');
