jQuery(document).ready(function ($) {

  // header
  $(".header").on('click', '.burger-menu', function () {
    $(this).addClass("active")

    $(".header-mobile").addClass("active")
  })

  $(".header-mobile").on("click", ".close-menu", function () {
    $(".header-mobile").removeClass("active")
  })

});