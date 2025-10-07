<?php
/**
 * Conference - Block
 */

$block_path = 'block-15';
$gutenberg_title = 'Block - 15';

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

$sup_title    = wp_kses(get_field('sup_title'), $allowed_tags);
$descr        = wp_kses(get_field('descr'), $allowed_tags);
$title        = wp_kses(get_field('title'), $allowed_tags);
$text         = wp_kses(get_field('text'), $allowed_tags);
$bottom_text  = wp_kses(get_field('bottom_text'), $allowed_tags);
$bottom_price = wp_kses(get_field('bottom_price'), $allowed_tags);

$btn_text     = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_is_link  = get_field('btn_is_link');
$btn_link     = esc_url(get_field('btn_link'));
$btn_popup    = get_field('btn_popup');

$bg_1920    = get_field('bg_1920') ? "background: url(" . esc_url(get_field('bg_1920')) . ") center / cover no-repeat;filter: blur(".get_field('blur_1920')."px);"  : '';
$bg_991     = get_field('bg_991') ? "background: url(" . esc_url(get_field('bg_991')) . ") center / cover no-repeat;filter: blur(".get_field('blur_991')."px);"  : '';
$bg_576     = get_field('bg_576') ? "background: url(" . esc_url(get_field('bg_576')) . ") center / cover no-repeat;filter: blur(".get_field('blur_576')."px);"  : '';

$numAttr = rand(1, 100000);
?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>" data-bg="<?= $numAttr; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenberg-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="block-bg"></div>
    <div class="container">
      <div class="line-wrap">
        <?php if($sup_title): ?><span class="sup_title"><?= $sup_title; ?></span><?php endif; ?>
        <?php if($descr): ?><p class="descr"><?= $descr; ?></p><?php endif; ?>
        <?php if($title): ?><h2 class="sect_title"><?= $title; ?></h2><?php endif; ?>
        <?php if($text): ?><div class="block-content d-block w-100p"><?= $text; ?></div><?php endif; ?>
        <div class="block-bottom">
          <?php if($bottom_text): ?><p class="descr"><?= $bottom_text; ?></p><?php endif; ?>
          <?php if($bottom_price): ?><span class="sup_title"><?= $bottom_price; ?></span><?php endif; ?>

          <?php if($btn_text): ?>
            <?php if($btn_is_link): ?>
              <a href="<?= $btn_link; ?>" target="_blank" rel="noopener noreferrer" class="btn"><?= $btn_text; ?></a>
            <?php else: ?>
              <button class="btn <?= $btn_popup; ?>"><?= $btn_text; ?></button>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->

<?php if( !is_admin() && $bg_1920 ): ?>
<style>
.<?= $block_path; ?>[data-bg="<?= $numAttr; ?>"] .block-bg { <?= $bg_1920; ?> }
@media (max-width: 991px) { .<?= $block_path; ?>[data-bg="<?= $numAttr; ?>"] .block-bg { <?= $bg_991; ?> } }
@media (max-width: 576px) { .<?= $block_path; ?>[data-bg="<?= $numAttr; ?>"] .block-bg { <?= $bg_576; ?> } }
</style>
<?php endif; ?>