<?php

// === Регистрируем Custom Post Type "Вакансии" ===
function register_vacancies_post_type() {

    $labels = array(
        'name'               => 'Вакансии',
        'singular_name'      => 'Вакансия',
        'menu_name'          => 'Вакансии',
        'name_admin_bar'     => 'Вакансия',
        'add_new'            => 'Добавить новую',
        'add_new_item'       => 'Добавить новую вакансию',
        'new_item'           => 'Новая вакансия',
        'edit_item'          => 'Редактировать вакансию',
        'view_item'          => 'Просмотр вакансии',
        'all_items'          => 'Все вакансии',
        'search_items'       => 'Поиск вакансий',
        'parent_item_colon'  => 'Родительская вакансия:',
        'not_found'          => 'Вакансии не найдены.',
        'not_found_in_trash' => 'В корзине вакансий нет.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true, // Включаем поддержку Gutenberg / API
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'vacancies'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-id', // Иконка меню в админке
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('vacancies', $args);
}
add_action('init', 'register_vacancies_post_type');


// === Регистрируем таксономии ===

// Город
function register_vacancy_city_taxonomy() {
    $labels = array(
        'name'              => 'Города',
        'singular_name'     => 'Город',
        'search_items'      => 'Найти город',
        'all_items'         => 'Все города',
        'edit_item'         => 'Редактировать город',
        'update_item'       => 'Обновить город',
        'add_new_item'      => 'Добавить новый город',
        'new_item_name'     => 'Название нового города',
        'menu_name'         => 'Город',
    );

    register_taxonomy('vacancy_city', array('vacancies'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'vacancy-city'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'register_vacancy_city_taxonomy');

// Зарплата
function register_vacancy_salary_taxonomy() {
    $labels = array(
        'name'              => 'Зарплата',
        'singular_name'     => 'Зарплата',
        'search_items'      => 'Найти зарплату',
        'all_items'         => 'Все зарплаты',
        'edit_item'         => 'Редактировать зарплату',
        'update_item'       => 'Обновить зарплату',
        'add_new_item'      => 'Добавить новую зарплату',
        'new_item_name'     => 'Название новой зарплаты',
        'menu_name'         => 'Зарплата',
    );

    register_taxonomy('vacancy_salary', array('vacancies'), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'vacancy-salary'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'register_vacancy_salary_taxonomy');

// Наименование (например, должность)
function register_vacancy_title_taxonomy() {
    $labels = array(
        'name'              => 'Наименования',
        'singular_name'     => 'Наименование',
        'search_items'      => 'Найти наименование',
        'all_items'         => 'Все наименования',
        'edit_item'         => 'Редактировать наименование',
        'update_item'       => 'Обновить наименование',
        'add_new_item'      => 'Добавить новое наименование',
        'new_item_name'     => 'Название нового наименования',
        'menu_name'         => 'Наименование',
    );

    register_taxonomy('vacancy_title', array('vacancies'), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'vacancy-title'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'register_vacancy_title_taxonomy');
