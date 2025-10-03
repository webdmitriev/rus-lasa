jQuery(function ($) {
  let selectedCategory = '';
  let selectedDate = '';
  let searchQuery = '';

  // 📂 Категории
  $('.data-categories .select-item').on('click', function () {
    selectedCategory = $(this).data('text');
    $('.selected-category').text('Категория: ' + $(this).text());
    filterPosts();
  });

  // 📅 Календарь
  const $calendar = $('<div class="calendar"></div>');
  $('.data-calendar .data-header').after($calendar);

  $calendar.datepicker({
    dateFormat: 'dd.mm.yy',
    onSelect: function (dateText) {
      selectedDate = dateText;
      $('.selected-date').text('Дата: ' + selectedDate);
      filterPosts();
    }
  });

  // 🔍 Поиск
  $('#search-input').on('keyup', function (e) {
    searchQuery = $(this).val();
    $('.selected-search').text(searchQuery ? 'Поиск: ' + searchQuery : '');
    filterPosts();
  });

  // 🧹 Сброс фильтров
  $('#reset-filters').on('click', function () {
    selectedCategory = '';
    selectedDate = '';
    searchQuery = '';

    // Очистим UI
    $('.selected-category').text('');
    $('.selected-date').text('');
    $('.selected-search').text('');
    $('#search-input').val('');
    $calendar.datepicker('setDate', null);

    filterPosts(); // покажет все посты
  });

  // 🔥 AJAX фильтр
  function filterPosts() {
    $.ajax({
      url: ajaxurl.url,
      type: 'POST',
      data: {
        action: 'filter_posts',
        category: selectedCategory,
        date: selectedDate,
        search: searchQuery
      },
      beforeSend: function () {
        $('.data-posts').html('<p>Загрузка...</p>');
      },
      success: function (response) {
        $('.data-posts').html(response);
      },
      error: function () {
        $('.data-posts').html('<p>Ошибка загрузки постов</p>');
      }
    });
  }
});
