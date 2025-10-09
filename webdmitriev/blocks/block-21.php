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
$title = wp_kses(get_field('title'), $allowed_tags);
$sub_title = wp_kses(get_field('sub_title'), $allowed_tags);
$books_merch = get_field('books_merch'); // badge, price, descr

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
          <h2 class="sect_title"><?= $title; ?></h2>
          <p class="descr"><?= $sub_title; ?></p>
        </div>
        <button class="basket-button" data-count="0"></button>
      </div>

      <div class="block__products">
        <?php if( $books_merch ): foreach( $books_merch as $post):
          $thumbnail_url = get_the_post_thumbnail_url($post->ID);
          ?>
          <div class="block__product" data-id="<?= $post->ID; ?>" data-price="<?= get_field('price', $post->ID ); ?>">
            <img src="<?= $thumbnail_url ? $thumbnail_url : $image_base64; ?>" alt="Rus Lasa" class="block__product-img" />
            <p class="block__product-title"><?= get_the_title($post->ID); ?></p>
            <p class="block__product-price"><?= get_field('price', $post->ID ); ?> руб</p>
            <div class="block__product-descr" style="display: none;"><?= get_field('descr', $post->ID ); ?></div>
            <button class="btn">Подробнее о товаре</button>
          </div>
        <?php endforeach; endif; ?>
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

<div class="basket__popup" style="display: none;">
  <div class="basket__popup-bg"></div>
  <button class="close-popup"></button>
  <div class="basket__popup-content scroll-line-none">
    <p class="basket-text-count">.</p>

    <div class="basket__items"></div>

    <div class="basket__controls df-sp-ce w-100p">
      <div class="basket-clean">Удалить все</div>
      <div class="basket__controls-count df-sp-ce w-100p">
        <p class="descr">Сумма:</p>
        <p id="result-sum">3200 руб</p>
      </div>
    </div>

    <div class="basket__form">
      <?= do_shortcode('[contact-form-7 id="298b3d4" title="Basket"]'); ?>
    </div>
  </div>
</div>

<div class="web-popup web-popup__thank-you">
  <div class="popup-bg"></div>
  <div class="close-web-popup"></div>
  <div class="popup-content">
    <img src="<?= $url; ?>/webdmitriev/assets/img/block-21/thank-you.png" alt="Rus Lasa" class="popup-content__image" />
    <div class="popup-content__text">
      <h3 class="popup-title">Спасибо за заказ!</h3>
      <p class="popup-descr">мы свяжемся для уточнения деталей заказа</p>
    </div>
  </div>
</div>
<?php endif; ?>