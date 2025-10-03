jQuery(document).ready(function ($) {

  // header
  $(".header").on('click', '.burger-menu', function () {
    $(this).addClass("active")

    $(".header-mobile").addClass("active")
  })

  $(".header-mobile").on("click", ".close-menu", function () {
    $(".header-mobile").removeClass("active")
  })

  // controls
  if ($(".block-14")) { newsBlock() }
  function newsBlock() {
    $(".data-select").on("click", ".data-header", function () {
      $(this).parents(".data-select").toggleClass("active")
    })

    $(".data-select.data-categories").on("click", ".select-item", function () {
      $(".data-select.data-categories").removeClass('active')
      $(".data-select.data-categories .select-item").each((idx, el) => $(el).removeClass("active"))
      $(this).toggleClass("active")
    })
  }

});