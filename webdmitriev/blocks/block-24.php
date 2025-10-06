<?php
/**
 * Conference - Block
 */

$block_path = 'block-24';
$gutenberg_title = 'Block - 24';

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

$date         = wp_kses(get_field('date'), $allowed_tags);
$title        = wp_kses(get_field('title'), $allowed_tags);
$descr        = wp_kses(get_field('descr'), $allowed_tags);

$btn_reg_text = wp_kses(get_field('btn_reg_text'), $allowed_tags);

$gallery      = get_field("gallery");
$slider       = get_field("slider");

$btn_pdf_text = wp_kses(get_field('btn_pdf_text'), $allowed_tags);
$btn_pdf_file = esc_url(get_field('btn_pdf_file'));

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenberg-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap">
        <?php if($date): ?><p class="single__date"><?= $date; ?></p><?php endif; ?>
        <?php if($title): ?><p class="single__title"><?= $title; ?></p><?php endif; ?>
        <?php if($descr): ?><p class="single__descr"><?= $descr; ?></p><?php endif; ?>
        <?php if($btn_reg_text): ?><button class="btn single__register"><?= $btn_reg_text; ?></button><?php endif; ?>

        <?php if($gallery): ?>
          <div class="single__galleries">
            <?php foreach($gallery as $image): ?>
              <img src="<?= $image; ?>" alt="Rus Lasa" />
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if($slider): ?>
          <div class="single__slider">
            <?php foreach($slider as $image): ?>
              <img src="<?= $image; ?>" alt="Rus Lasa" class="single__slide" />
            <?php endforeach; ?>
          </div>
          <div class="single__slider-arrows df-ce-ce w-100p">
            <button class="single__slider-arrow single__slider-arrow-prev"></button>
            <button class="single__slider-arrow single__slider-arrow-next"></button>
          </div>
        <?php endif; ?>

        <?php if($btn_pdf_text): ?><a href="<?= $btn_pdf_file; ?>" class="btn single__pdf" download><?= $btn_pdf_text; ?></a><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
