<?php
/**
 * Conference - Block
 */

$block_path = 'block-02';
$gutenberg_title = 'Block - 02';

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

$text     = wp_kses(get_field('text'), $allowed_tags);
$btn_text     = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_is_link  = get_field('btn_is_link');
$btn_link     = esc_url(get_field('btn_link'));
$btn_popup    = get_field('btn_popup');

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
      <?php if($text): ?><p class="descr"><?= $text; ?></p><?php endif; ?>
      <?php if($btn_text): ?>
        <?php if($btn_is_link): ?>
          <a href="<?= $btn_link; ?>" target="_blank" rel="noopener noreferrer" class="btn"><?= $btn_text; ?></a>
        <?php else: ?>
          <button class="btn <?= $btn_popup; ?>"><?= $btn_text; ?></button>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
