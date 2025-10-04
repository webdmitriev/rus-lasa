jQuery(document).ready(function ($) {

  const isAnimation = document.querySelector('.add-animation');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => entry.isIntersecting ? entry.target.classList.add('isAnime') : entry.target.classList.remove('isAnime'))
  }, { rootMargin: "-50px 0px -100px 0px" })

  // block-02
  if (isAnimation && document.querySelector('.block-02')) {
    if (document.querySelector('.block-02 .descr')) {
      const descr = document.querySelectorAll('.block-02 .descr')
      descr.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-02 .btn')) {
      const btn = document.querySelectorAll('.block-02 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-03
  if (isAnimation && document.querySelector('.block-03')) {
    if (document.querySelector('.block-03 .block-content ul li')) {
      const elements = document.querySelectorAll('.block-03 .block-content ul li')
      elements.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-03 .sect_title')) {
      const title = document.querySelectorAll('.block-03 .sect_title')
      title.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-03 .btn')) {
      const btn = document.querySelectorAll('.block-03 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-04
  if (isAnimation && document.querySelector('.block-04')) {
    if (document.querySelector('.block-04 .sect_title')) {
      const title = document.querySelectorAll('.block-04 .sect_title')
      title.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-04 .sub_title')) {
      const subTitle = document.querySelectorAll('.block-04 .sub_title')
      subTitle.forEach(el => observer.observe(el))
    }
  }

  // block-05
  if (isAnimation && document.querySelector('.block-05')) {
    if (document.querySelector('.block-05 .img')) {
      const img = document.querySelectorAll('.block-05 .img')
      img.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-05 .items__li')) {
      const elements = document.querySelectorAll('.block-05 .items__li')
      elements.forEach(el => observer.observe(el))
    }
  }

  // block-06
  if (isAnimation && document.querySelector('.block-06')) {
    if (document.querySelector('.block-06 .descr')) {
      const descr = document.querySelectorAll('.block-06 .descr')
      descr.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-06 .block__logotypes img')) {
      const images = document.querySelectorAll('.block-06 .block__logotypes img')
      images.forEach(el => observer.observe(el))
    }
  }

  // block-09
  if (isAnimation && document.querySelector('.block-09')) {
    if (document.querySelector('.block-09 .block__image img')) {
      const img = document.querySelectorAll('.block-09 .block__image img')
      img.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-09 .block__image .descr')) {
      const descr = document.querySelectorAll('.block-09 .block__image .descr')
      descr.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-09 .block__content')) {
      const images = document.querySelectorAll('.block-09 .block__content')
      images.forEach(el => observer.observe(el))
    }
  }

  // block-11
  if (isAnimation && document.querySelector('.block-11')) {
    if (document.querySelector('.block-11 .block__post')) {
      const img = document.querySelectorAll('.block-11 .block__post')
      img.forEach(el => observer.observe(el))
    }
  }

  // block-12
  if (isAnimation && document.querySelector('.block-12')) {
    if (document.querySelector('.block-12 .block-title')) {
      const title = document.querySelectorAll('.block-12 .block-title')
      title.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-12 .btn')) {
      const btn = document.querySelectorAll('.block-12 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

});