<?php
/**
 * Conference - Block
 */

$block_path = 'block-12';
$gutenberg_title = 'Block - 12';

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

$title = wp_kses(get_field('title'), $allowed_tags);
$btns = get_field('btns'); // btn_text, btn_link

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
      <?php if($title): ?><h2 class="block-title"><?= $title; ?></h2><?php endif; ?>
      <?php if( have_rows('btns') ): while ( have_rows('btns') ): the_row(); ?>
        <div class="block-wrap"><a href="<?= get_sub_field('btn_link'); ?>" class="btn"><?= get_sub_field('btn_text'); ?></a></div>
      <?php endwhile; endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
