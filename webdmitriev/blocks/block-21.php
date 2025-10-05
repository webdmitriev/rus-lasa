<?php
/**
 * Conference - Block
 */

$block_path = 'block-21';
$gutenberg_title = 'Block - 21';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'a'  => array(
    'href' => array(),
  ),
  'b'    => array(),
  'br'    => array(),
  'span'  => array(
    'class' => array(),
  ),
  'ul'  => array(),
  'li'  => array(),
);

$bgc      = get_field('bgc') ? get_field('bgc') : '--bg-gray-color';
$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>" style="background-color: var(<?= $bgc; ?>)">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenberg-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-sp-fs w-100p">
        <div class="block-content">
          <h2 class="sect_title">Магазин Rus-LASA</h2>
          <p class="descr">Здесь можно приобрести учебную литературу, а&nbsp;также продукцию с&nbsp;символикой Ассоциации</p>
        </div>
        <button class="basket-button" data-count="0"></button>
      </div>

      <div class="block__products">
        <div class="block__product" data-id="12" data-price="1500">
          <img src="<?= $url; ?>/webdmitriev/assets/img/block-21/image-01.jpg" alt="Rus Lasa" class="block__product-img" />
          <p class="block__product-title">Руководство по содержанию и использованию лабораторных животных</p>
          <p class="block__product-price">1500 руб</p>
          <div class="block__product-descr" style="display: none;">Предлагаемая вниманию читателей книга является переводом восьмого издания Guide for the care and use of&nbsp;laboratory animals (NAP, 2011)&nbsp;&mdash; руководства, получившего широкую мировую признательность за&nbsp;всестороннее освещение научно обоснованных положений по&nbsp;содержанию и&nbsp;использованию лабораторных животных.Потребность в&nbsp;подобных методических указаниях в&nbsp;России крайне высока, потому что до&nbsp;настоящего времени не&nbsp;разработана национальная нормативная база, регламентирующая требования к&nbsp;использованию экспериментальных животных в&nbsp;научных и&nbsp;учебных целях. Между тем порядок организации работы вивариев, условия содержания и&nbsp;использования лабораторных животных определяют надежность получаемых научных данных, их&nbsp;повторяемость и&nbsp;воспроизводимость. <br/><br/>Только соблюдение высоких стандартов экспериментальной практики с&nbsp;использованием лабораторных животных позволит российским ученым иметь конкурентоспособные публикации собственных данных и&nbsp;признание результатов международной научной общественностью. Ранее на&nbsp;русский язык было переведено седьмое издание Руководства по&nbsp;содержанию и&nbsp;использованию лабораторных животных (1996), позволившее многим учреждениям выйти на&nbsp;приемлемый уровень организации экспериментальной деятельности с&nbsp;использованием лабораторных животных. <br/><br/>Перевод выполнен специалистами, имеющими многолетний опыт работы с&nbsp;экспериментальными животными и&nbsp;переводом англоязычной литературы: И.&nbsp;В.&nbsp;Белозерцевой (к.б.н., ПСПбГМУ им. И.&nbsp;П.&nbsp;Павлова, Санкт-Петербург) и&nbsp;М.&nbsp;С.&nbsp;Красильщиковой (к.б.н., ИБХ РАН, Москва).</div>
          <button class="btn">Подробнее о товаре</button>
        </div>
        <div class="block__product" data-id="13" data-price="1800">
          <img src="<?= $url; ?>/webdmitriev/assets/img/block-21/image-02.jpg" alt="Rus Lasa" class="block__product-img" />
          <p class="block__product-title">01 Руководство по содержанию и использованию лабораторных животных</p>
          <p class="block__product-price">1800 руб</p>
          <div class="block__product-descr" style="display: none;">01 Предлагаемая вниманию читателей книга является переводом восьмого издания Guide for the care and use of&nbsp;laboratory animals (NAP, 2011)&nbsp;&mdash; руководства, получившего широкую мировую признательность за&nbsp;всестороннее освещение научно обоснованных положений по&nbsp;содержанию и&nbsp;использованию лабораторных животных.Потребность в&nbsp;подобных методических указаниях в&nbsp;России крайне высока, потому что до&nbsp;настоящего времени не&nbsp;разработана национальная нормативная база, регламентирующая требования к&nbsp;использованию экспериментальных животных в&nbsp;научных и&nbsp;учебных целях. Между тем порядок организации работы вивариев, условия содержания и&nbsp;использования лабораторных животных определяют надежность получаемых научных данных, их&nbsp;повторяемость и&nbsp;воспроизводимость. <br/><br/>Только соблюдение высоких стандартов экспериментальной практики с&nbsp;использованием лабораторных животных позволит российским ученым иметь конкурентоспособные публикации собственных данных и&nbsp;признание результатов международной научной общественностью. Ранее на&nbsp;русский язык было переведено седьмое издание Руководства по&nbsp;содержанию и&nbsp;использованию лабораторных животных (1996), позволившее многим учреждениям выйти на&nbsp;приемлемый уровень организации экспериментальной деятельности с&nbsp;использованием лабораторных животных. <br/><br/>Перевод выполнен специалистами, имеющими многолетний опыт работы с&nbsp;экспериментальными животными и&nbsp;переводом англоязычной литературы: И.&nbsp;В.&nbsp;Белозерцевой (к.б.н., ПСПбГМУ им. И.&nbsp;П.&nbsp;Павлова, Санкт-Петербург) и&nbsp;М.&nbsp;С.&nbsp;Красильщиковой (к.б.н., ИБХ РАН, Москва).</div>
          <button class="btn">Подробнее о товаре</button>
        </div>
        <div class="block__product" data-id="14" data-price="2200">
          <img src="<?= $url; ?>/webdmitriev/assets/img/block-21/image-03.jpg" alt="Rus Lasa" class="block__product-img" />
          <p class="block__product-title">02 Руководство по содержанию и использованию лабораторных животных</p>
          <p class="block__product-price">2200 руб</p>
          <div class="block__product-descr" style="display: none;">02 Предлагаемая вниманию читателей книга является переводом восьмого издания Guide for the care and use of&nbsp;laboratory animals (NAP, 2011)&nbsp;&mdash; руководства, получившего широкую мировую признательность за&nbsp;всестороннее освещение научно обоснованных положений по&nbsp;содержанию и&nbsp;использованию лабораторных животных.Потребность в&nbsp;подобных методических указаниях в&nbsp;России крайне высока, потому что до&nbsp;настоящего времени не&nbsp;разработана национальная нормативная база, регламентирующая требования к&nbsp;использованию экспериментальных животных в&nbsp;научных и&nbsp;учебных целях. Между тем порядок организации работы вивариев, условия содержания и&nbsp;использования лабораторных животных определяют надежность получаемых научных данных, их&nbsp;повторяемость и&nbsp;воспроизводимость. <br/><br/>Только соблюдение высоких стандартов экспериментальной практики с&nbsp;использованием лабораторных животных позволит российским ученым иметь конкурентоспособные публикации собственных данных и&nbsp;признание результатов международной научной общественностью. Ранее на&nbsp;русский язык было переведено седьмое издание Руководства по&nbsp;содержанию и&nbsp;использованию лабораторных животных (1996), позволившее многим учреждениям выйти на&nbsp;приемлемый уровень организации экспериментальной деятельности с&nbsp;использованием лабораторных животных. <br/><br/>Перевод выполнен специалистами, имеющими многолетний опыт работы с&nbsp;экспериментальными животными и&nbsp;переводом англоязычной литературы: И.&nbsp;В.&nbsp;Белозерцевой (к.б.н., ПСПбГМУ им. И.&nbsp;П.&nbsp;Павлова, Санкт-Петербург) и&nbsp;М.&nbsp;С.&nbsp;Красильщиковой (к.б.н., ИБХ РАН, Москва).</div>
          <button class="btn">Подробнее о товаре</button>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->

<?php if( !is_admin() ) : ?>
<div class="product__popup" style="display: none;">
  <div class="product__popup-bg"></div>
  <button class="close-popup"></button>
  <div class="product__popup-content df-sp-fs w-100p scroll-line-none">
    <div class="content__image df-sp-fs w-100p">
      <img src="<?= $image_base64; ?>" alt="Rus Lasa" class="product__img" />
      <p class="product__title"></p>
      <p class="product__price" data-word="&nbsp;руб"></p>
    </div>
    <div class="content__descr"></div>
    <div class="content__bottom"><button class="btn" product-id="0">Добавить в корзину</button></div>
  </div>
</div>

<div class="basket__popup">
  <div class="basket__popup-bg"></div>
  <button class="close-popup"></button>
  <div class="basket__popup-content scroll-line-none">
    <p class="basket-text-count">В вашей корзине 3 товара</p>

    <div class="basket__items">
      <div class="basket__item">
        www
      </div>
    </div>

  </div>
</div>
<?php endif; ?>