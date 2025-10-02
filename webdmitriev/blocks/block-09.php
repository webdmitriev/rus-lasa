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

$bgc          = get_field('bgc') ? get_field('bgc') : '--bg-gray-color';
$image        = esc_url(get_field('image'));
$sum_people   = wp_kses(get_field('sum_people'), $allowed_tags);
$btn_text     = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_sub_text = wp_kses(get_field('btn_sub_text'), $allowed_tags);


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
      <div class="line-wrap df-ce-ce w-100p">
        <div class="block__image">
          <?php if($image): ?><img src="<?= $image; ?>" alt="Rus Lasa" /><?php endif; ?>
          <?php if($sum_people): ?><span class="descr" data-before="Нас уже:" data-after="человек(а)"><?= $sum_people; ?></span><?php endif; ?>
        </div>
        <div class="block__content">
          <?php if($btn_text): ?><button class="btn"><?= $btn_text; ?></button><?php endif; ?>
          <?php if($btn_sub_text): ?><p class="descr"><?= $btn_sub_text; ?></p><?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
