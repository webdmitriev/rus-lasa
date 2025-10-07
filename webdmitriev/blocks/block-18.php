<?php
/**
 * Conference - Block
 */

$block_path = 'block-18';
$gutenberg_title = 'Block - 18';

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
$descr    = wp_kses(get_field('descr'), $allowed_tags);
$elements = get_field('elements'); // descr, btn_text, btn_is_link, btn_link, btn_popup

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
      <?php if($descr): ?><p class="descr"><?= $descr; ?></p><?php endif; ?>

      <?php if( have_rows('elements') ): while ( have_rows('elements') ): the_row(); ?>
        <div class="d-block">
          <?php if(get_sub_field('descr')): ?><p class="descr"><?= get_sub_field('descr'); ?></p><?php endif; ?>

          <?php if(get_sub_field('btn_text')): ?>
            <?php if(get_sub_field('btn_is_link')): ?>
              <a href="<?= get_sub_field('btn_link'); ?>" target="_blank" rel="noopener noreferrer" class="btn"><?= get_sub_field('btn_text'); ?></a>
            <?php else: ?>
              <button class="btn <?= get_sub_field('btn_popup'); ?>"><?= get_sub_field('btn_text'); ?></button>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      <?php endwhile; endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
