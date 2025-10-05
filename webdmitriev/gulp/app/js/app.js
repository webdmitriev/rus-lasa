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
    getCountBasket()
    function getCountBasket() {
      const countBasket = (JSON.parse(localStorage.getItem("wwww")) || []).length
      $(".block-21 .line-wrap .basket-button").attr("data-count", countBasket)
    }

    function cleanPopupProduct() {
      $(".product__popup").hide();

      $(".product__popup .product__img").attr("src", 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==')
      $(".product__popup .product__title").text('')
      $(".product__popup .product__price").text('')
      $(".product__popup .content__descr").text('')
      $(".product__popup .btn").attr("product-id", '0')
    }

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
      $(".product__popup .btn").attr("disabled", false);

      $(".product__popup").show();
    })

    $(".product__popup").on("click", ".close-popup", function () {
      cleanPopupProduct()
    })


    $(".product__popup").on("click", ".btn", function () {
      $(this).attr("disabled", true);

      const $popup = $(this).parents(".product__popup-content");
      const id = $(this).attr("product-id");
      const title = $popup.find(".product__title").text();
      const image = $popup.find(".product__img").attr("src");
      const price = $popup.find(".product__price").text();
      const descr = $popup.find(".content__descr").text();

      // 1. Получаем текущую корзину
      let basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];

      // 2. Проверяем, есть ли уже этот товар в корзине
      const existingItem = basket.find(item => item.id === id);

      if (existingItem) {
        // 3а. Если товар уже есть — увеличиваем количество
        existingItem.count += 1;
      } else {
        // 3б. Если товара нет — добавляем новый объект
        basket.push({
          id: id,
          title: title,
          image: image,
          price: price,
          descr: descr,
          count: 1
        });
      }

      // 4. Сохраняем обновлённый массив обратно
      localStorage.setItem("basket-webdmitriev", JSON.stringify(basket));
    });
  }

});