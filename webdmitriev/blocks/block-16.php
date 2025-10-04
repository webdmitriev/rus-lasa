<?php
/**
 * Conference - Block
 */

$block_path = 'block-16';
$gutenberg_title = 'Block - 16';

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
$title    = wp_kses(get_field('title'), $allowed_tags);
$image    = esc_url(get_field('image'));
$descr    = wp_kses(get_field('descr'), $allowed_tags);
$table    = get_field('table'); // text_01, text_02

$btn_text = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_file = esc_url(get_field('btn_file'));

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
      <?php if($title): ?><h2 class="sect_title"><?= $title; ?></h2><?php endif; ?>
      <?php if($image): ?><img src="<?= $image; ?>" alt="Rus Lasa" class="img" /><?php endif; ?>
      <?php if($descr): ?><p class="descr"><?= $descr; ?></p><?php endif; ?>

      <?php if( have_rows('table') ) : ?>
        <div class="table-container">
          <?php while ( have_rows('table') ) : the_row(); ?>
            <div class="table-item"><?= get_sub_field('text_01'); ?></div>
            <div class="table-item"><?= get_sub_field('text_02'); ?></div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <?php if($btn_text): ?><a href="<?= $btn_file; ?>" class="link" download><?= $btn_text; ?></a><?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
