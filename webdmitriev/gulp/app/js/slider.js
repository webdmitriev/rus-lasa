document.addEventListener('DOMContentLoaded', function () {

  $('.block-08 .block-slider').each(function () {
    const slider = $(this);
    slider.slick({
      autoplay: true,
      autoplaySpeed: 700000,
      dots: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $(".block-08 .block-slider__arrows .block-slider__arrow-prev"),
      nextArrow: $(".block-08 .block-slider__arrows .block-slider__arrow-next"),
      rows: 0,
      adaptiveHeight: true, // ← ключевая настройка
    });
  });

  $('.block-10 .block-slider').each(function () {
    const slider = $(this);
    slider.slick({
      autoplay: true,
      autoplaySpeed: 700000,
      dots: false,
      infinite: true,
      variableWidth: true,
      centerMode: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $(".block-10 .block-slider__arrows .block-slider__arrow-prev"),
      nextArrow: $(".block-10 .block-slider__arrows .block-slider__arrow-next"),
      rows: 0,
    });
  });

  $('.block-24 .single__slider').each(function () {
    const slider = $(this);
    slider.slick({
      autoplay: true,
      autoplaySpeed: 700000,
      dots: false,
      infinite: true,
      // variableWidth: true,
      centerMode: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $(".block-24 .single__slider-arrow-prev"),
      nextArrow: $(".block-24 .single__slider-arrow-next"),
      rows: 0,
    });
  });

})