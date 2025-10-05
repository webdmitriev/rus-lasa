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

  // block-20
  if (document.querySelector('.block-20')) {
    $(".block-20 #vacancy-filter").on("click", ".block-vacancy__header", function () {
      $(this).toggleClass("active")
      $(this).parents(".block-vacancy").find(".block-vacancy__content").slideToggle()
    })
  }

  // block-21
  if (document.querySelector('.block-21')) {
    $(".block-21 .block__products .block__product").on("click", ".btn", function () {
      const id = $(this).parents(".block__product").attr("data-id")
      const title = $(this).parents(".block__product").find(".block__product-title").text()
      const image = $(this).parents(".block__product").find(".block__product-img").attr("src")
      const price = $(this).parents(".block__product").attr("data-price")
      const descr = $(this).parents(".block__product").find(".block__product-descr").text()

      $(".product__popup .product__img").attr("src", image)
      $(".product__popup .product__title").text(title)
      $(".product__popup .product__price").text(price)
      $(".product__popup .content__descr").text(descr)
      $(".product__popup .btn").attr("product-id", id)

      $(".product__popup").show();
    })

    $(".product__popup").on("click", ".close-popup", function () {
      $(".product__popup").hide();

      $(".product__popup .product__img").attr("src", 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==')
      $(".product__popup .product__title").text('')
      $(".product__popup .product__price").text('')
      $(".product__popup .content__descr").text('')
      $(".product__popup .btn").attr("product-id", '0')
    })
  }

});