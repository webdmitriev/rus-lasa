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

$date           = wp_kses(get_field('date'), $allowed_tags);
$title          = wp_kses(get_field('title'), $allowed_tags);
$descr          = wp_kses(get_field('descr'), $allowed_tags);

$btn_reg_text   = wp_kses(get_field('btn_reg_text'), $allowed_tags);
$btn_reg_popup  = get_field('btn_reg_popup');

$gallery        = get_field("gallery");
$slider         = get_field("slider");

$btn_text       = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_is_link    = get_field('btn_is_link');
$btn_link       = esc_url(get_field('btn_link'));
$btn_popup      = get_field('btn_popup');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>">
  <?php if( is_admin() ) : ?>
    <div class="gutenberg-block" style="display: block;max-width: 100%;padding: 10px;object-fit: contain;background-color: #ffffff;border: 1px solid #D1D1D1;">
      <img style="max-width: 100%;" src="<?= $url . '/webdmitriev/images/' . $block_path . '.jpg'; ?>" alt="Rus Lasa" />
    </div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap">
        <?php if($date): ?><p class="single__date"><?= $date; ?></p><?php endif; ?>
        <?php if($title): ?><p class="single__title"><?= $title; ?></p><?php endif; ?>
        <?php if($descr): ?><p class="single__descr"><?= $descr; ?></p><?php endif; ?>
        <?php if($btn_reg_text): ?><button class="btn single__register <?= $btn_reg_popup; ?>"><?= $btn_reg_text; ?></button><?php endif; ?>

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

        <?php if($btn_text): ?>
          <?php if($btn_is_link): ?>
            <a href="<?= $btn_link; ?>" target="_blank" rel="noopener noreferrer" class="btn single__pdf"><?= $btn_text; ?></a>
          <?php else: ?>
            <button class="btn single__pdf <?= $btn_popup; ?>"><?= $btn_text; ?></button>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
