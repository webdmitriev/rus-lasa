jQuery(document).ready(function ($) {

  const isAnimation = document.querySelector('.add-animation');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => entry.isIntersecting ? entry.target.classList.add('isAnime') : entry.target.classList.remove('www'))
  }, { rootMargin: "-5px 0px -100px 0px" })

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

  // block-13
  if (isAnimation && document.querySelector('.block-13')) {
    if (document.querySelector('.block-13 .descr')) {
      const btn = document.querySelectorAll('.block-13 .descr')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-15
  if (isAnimation && document.querySelector('.block-15')) {
    if (document.querySelector('.block-15 .sup_title')) {
      const btn = document.querySelectorAll('.block-15 .sup_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-15 .descr')) {
      const btn = document.querySelectorAll('.block-15 .descr')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-15 .sect_title')) {
      const btn = document.querySelectorAll('.block-15 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-15 .block-content ul li')) {
      const btn = document.querySelectorAll('.block-15 .block-content ul li')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-15 .block-bottom')) {
      const btn = document.querySelectorAll('.block-15 .block-bottom')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-16
  if (isAnimation && document.querySelector('.block-16')) {
    if (document.querySelector('.block-16 .sect_title')) {
      const btn = document.querySelectorAll('.block-16 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-16 .img')) {
      const btn = document.querySelectorAll('.block-16 .img')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-16 .descr')) {
      const btn = document.querySelectorAll('.block-16 .descr')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-16 .table-container')) {
      const btn = document.querySelectorAll('.block-16 .table-container')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-16 .link')) {
      const btn = document.querySelectorAll('.block-16 .link')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-17
  if (isAnimation && document.querySelector('.block-17')) {
    if (document.querySelector('.block-17 .sect_title')) {
      const btn = document.querySelectorAll('.block-17 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-17 .post-item')) {
      const btn = document.querySelectorAll('.block-17 .post-item')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-17 .btn')) {
      const btn = document.querySelectorAll('.block-17 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-18
  if (isAnimation && document.querySelector('.block-18')) {
    if (document.querySelector('.block-18 .sect_title')) {
      const btn = document.querySelectorAll('.block-18 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-18 .descr')) {
      const btn = document.querySelectorAll('.block-18 .descr')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-18 .d-block')) {
      const btn = document.querySelectorAll('.block-18 .d-block')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-19
  if (isAnimation && document.querySelector('.block-19')) {
    if (document.querySelector('.block-19 .descr')) {
      const btn = document.querySelectorAll('.block-19 .descr')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-19 .btn')) {
      const btn = document.querySelectorAll('.block-19 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-22
  if (isAnimation && document.querySelector('.block-22')) {
    if (document.querySelector('.block-22 .sect_title')) {
      const btn = document.querySelectorAll('.block-22 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-22 .sub_title')) {
      const btn = document.querySelectorAll('.block-22 .sub_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-22 ul li')) {
      const btn = document.querySelectorAll('.block-22 ul li')
      btn.forEach(el => observer.observe(el))
    }
  }

  // block-23
  if (isAnimation && document.querySelector('.block-23')) {
    if (document.querySelector('.block-23 .sect_title')) {
      const btn = document.querySelectorAll('.block-23 .sect_title')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-23 ul li')) {
      const btn = document.querySelectorAll('.block-23 ul li')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-23 .descr')) {
      const btn = document.querySelectorAll('.block-23 .descr')
      btn.forEach(el => observer.observe(el))
    }

    if (document.querySelector('.block-23 .btn')) {
      const btn = document.querySelectorAll('.block-23 .btn')
      btn.forEach(el => observer.observe(el))
    }
  }

});