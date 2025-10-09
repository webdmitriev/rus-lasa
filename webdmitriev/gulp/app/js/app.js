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

  // btn-web-popups
  $(".close-web-popup").on("click", function () {
    $(".web-popup").removeClass("active")
  })
  function showPopups(btn, popup) {
    $("body").on("click", btn, () => popup.addClass("active"))
  }
  showPopups(".btn-web-popup-course", $(".web-popup-course"))
  showPopups(".btn-web-popup-participation", $(".web-popup-participation"))
  showPopups(".btn-web-popup-default", $(".web-popup-default"))

  // block-20
  if (document.querySelector('.block-20')) {
    $(".block-20 #vacancy-filter").on("click", ".block-vacancy__header", function () {
      $(this).toggleClass("active")
      $(this).parents(".block-vacancy").find(".block-vacancy__content").slideToggle()
    })
  }

  // block-21
  if (document.querySelector('.block-21')) {
    const popupThankYou = document.querySelector('.web-popup.web-popup__thank-you');

    getCountBasket();

    function getCountBasket() {
      const basketData = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      const totalCount = basketData.reduce((acc, item) => acc + item.count, 0);
      $(".block-21 .line-wrap .basket-button").attr("data-count", totalCount);
      $(".basket__popup .basket__popup-content .basket-text-count").text(`В вашей корзине ${totalCount} товара`);
    }

    function cleanPopupProduct() {
      $(".product__popup").hide();
      $(".product__popup .product__img").attr("src", 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==');
      $(".product__popup .product__title").text('');
      $(".product__popup .product__price").text('');
      $(".product__popup .content__descr").text('');
      $(".product__popup .btn").attr("product-id", '0');
    }

    // Открытие всплывающего окна товара
    $(".block-21 .block__products .block__product").on("click", ".btn", function () {
      const $p = $(this).parents(".block__product");
      const id = $p.attr("data-id");
      const title = $p.find(".block__product-title").text();
      const image = $p.find(".block__product-img").attr("src");
      const price = $p.attr("data-price");
      const descr = $p.find(".block__product-descr").text();

      $(".product__popup .product__img").attr("src", image);
      $(".product__popup .product__title").text(title);
      $(".product__popup .product__price").text(price);
      $(".product__popup .content__descr").text(descr);
      $(".product__popup .btn").attr("product-id", id).attr("disabled", false);

      $(".product__popup").show();
    });

    $(".product__popup").on("click", ".close-popup", function () {
      cleanPopupProduct();
    });

    // Добавление в корзину
    $(".product__popup").on("click", ".btn", function () {
      $(this).attr("disabled", true);

      const $popup = $(this).parents(".product__popup-content");
      const id = $(this).attr("product-id");
      const title = $popup.find(".product__title").text();
      const image = $popup.find(".product__img").attr("src");
      const price = Number($popup.find(".product__price").text());
      const descr = $popup.find(".content__descr").text();

      let basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      const existing = basket.find(item => item.id === id);

      if (existing) {
        existing.count++;
      } else {
        basket.push({ id, title, image, price, descr, count: 1 });
      }

      localStorage.setItem("basket-webdmitriev", JSON.stringify(basket));
      getCountBasket();
    });

    // Открытие корзины
    $(".block-21").on("click", ".basket-button", function () {
      renderBasket();
      $(".basket__popup").show();
    });

    $(".basket__popup").on("click", ".close-popup, .basket__popup-bg", function () {
      $(".basket__popup").hide();
    });

    // Рендер корзины
    function renderBasket() {
      const basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      const basketItems = $(".basket__popup .basket__items");
      basketItems.html('');

      let total = 0;

      basket.forEach(el => {
        total += el.price * el.count;
        basketItems.append(`
        <div class="basket__item" product-id="${el.id}">
          <img src="${el.image}" alt="${el.title}" class="basket__item-img" />
          <div class="basket__item-content">
            <p class="basket__item-title">${el.title}</p>
            <p class="basket__item-price">${el.price} руб</p>
          </div>
          <div class="basket__item-count">
            <div class="count-minus"></div>
            <div class="count-num">${el.count}</div>
            <div class="count-plus"></div>
          </div>
          <div class="basket__item-sum">${el.price * el.count} руб</div>
          <div class="basket__item-remove"></div>
        </div>
      `);
      });

      $("#result-sum").text(`${total} руб`);

      updateFormFields()
    }

    function updateFormFields() {
      const basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];

      // Преобразуем корзину в удобный текст
      const itemsText = basket.map(item =>
        `${item.title} — ${item.count} шт. × ${item.price} руб = ${item.count * item.price} руб`
      ).join('\n');

      const total = basket.reduce((acc, el) => acc + el.price * el.count, 0);

      // Найдём скрытые поля в форме
      const form = document.querySelector('.basket__form form');
      if (!form) return;

      const basketItemsInput = form.querySelector('input[name="basket-items"]');
      const basketTotalInput = form.querySelector('input[name="basket-total"]');

      if (basketItemsInput) basketItemsInput.value = itemsText;
      if (basketTotalInput) basketTotalInput.value = total + ' руб';
    }

    // Минус
    $(".basket__popup .basket__items").on("click", ".count-minus", function () {
      const id = $(this).parents(".basket__item").attr("product-id");
      let basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      const item = basket.find(el => el.id === id);

      if (item) {
        item.count--;
        if (item.count <= 0) {
          basket = basket.filter(el => el.id !== id);
        }
        localStorage.setItem("basket-webdmitriev", JSON.stringify(basket));
        renderBasket();
        getCountBasket();
      }
    });

    // Плюс
    $(".basket__popup .basket__items").on("click", ".count-plus", function () {
      const id = $(this).parents(".basket__item").attr("product-id");
      let basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      const item = basket.find(el => el.id === id);

      if (item) {
        item.count++;
        localStorage.setItem("basket-webdmitriev", JSON.stringify(basket));
        renderBasket();
        getCountBasket();
      }
    });

    // Удалить один товар
    $(".basket__popup .basket__items").on("click", ".basket__item-remove", function () {
      const id = $(this).parents(".basket__item").attr("product-id");
      let basket = JSON.parse(localStorage.getItem("basket-webdmitriev")) || [];
      basket = basket.filter(el => el.id !== id);
      localStorage.setItem("basket-webdmitriev", JSON.stringify(basket));
      renderBasket();
      getCountBasket();
    });

    // Удалить всё
    $(".basket-clean").on("click", function () {
      localStorage.removeItem("basket-webdmitriev");
      renderBasket();
      getCountBasket();
    });

    // После успешной отправки формы CF7
    document.addEventListener('wpcf7mailsent', function (event) {
      // 1. Очищаем localStorage
      localStorage.removeItem("basket-webdmitriev");

      // 2. Обновляем UI корзины
      renderBasket();
      getCountBasket();

      // 3. Закрываем попап корзины (опционально)
      $(".basket__popup").hide();

      // 4. Открываем popup thank-you
      setTimeout(() => {
        if (popupThankYou) {
          popupThankYou.classList.add('active');
        }
      }, 400);

    }, false);
  }

  // block-19
  if (document.querySelector('.block-19')) {
    showPopups(".btn-web-popup-vacancy", $(".web-popup-vacancy"))
  }


});