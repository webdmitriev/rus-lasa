jQuery(function ($) {
  let selectedCategory = '';
  let selectedDate = '';
  let searchQuery = '';

  // 📂 Категории
  $('.data-categories .select-item').on('click', function () {
    selectedCategory = $(this).data('text');
    $('.selected-category').text('Категория: ' + $(this).text());
    filterPosts();
    $(".data-select.filter-reset").show()
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
      $(".data-select.filter-reset").show()
    }
  });

  // 🔍 Поиск
  $('#search-input').on('keyup', function (e) {
    searchQuery = $(this).val();
    $('.selected-search').text(searchQuery ? 'Поиск: ' + searchQuery : '');
    filterPosts();
    $(".data-select.filter-reset").show()
  });

  // 🧹 Сброс фильтров
  $('#reset-filters').on('click', function () {
    $(".data-select.filter-reset").hide()
    selectedCategory = '';
    selectedDate = '';
    searchQuery = '';

    // Очистим UI
    $('.selected-category').text('');
    $('.selected-date').text('');
    $('.selected-search').text('');
    $('#search-input').val('');
    $('.data-select').each((idx, el) => $(el).removeClass('active'))
    $('.data-categories .select-item').each((idx, el) => $(el).removeClass('active'))
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
