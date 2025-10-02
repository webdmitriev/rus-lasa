<?php
/**
 * Conference - Block
 */

$block_path = 'block-09';
$gutenberg_title = 'Block - 09';

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
  )
);

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

?>
<?php if(false): ?>www<?php endif; ?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenberg-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-ce-ce w-100p">
        <div class="block__image">
          <img src="<?= $url; ?>/webdmitriev/assets/img/block-09/image-01.png" alt="Rus Lasa" />
          <span class="descr" data-before="Нас уже:" data-after="человек(а)">30</span>
        </div>
        <div class="block__content">
          <button class="btn">Присоединиться</button>
          <p class="descr">Будьте в&nbsp;курсе актуальных новостей!</p>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
