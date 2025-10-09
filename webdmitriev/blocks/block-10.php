<?php
/**
 * Conference - Block
 */

$block_path = 'block-10';
$gutenberg_title = 'Block - 10';

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

$slider   = get_field('slider');

$btn_text     = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_is_link  = get_field('btn_is_link');
$btn_link     = esc_url(get_field('btn_link'));
$btn_popup    = get_field('btn_popup');

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
      <?php if( $slider ): ?>
        <div class="block-slider">
          <?php foreach( $slider as $image ): ?>
            <div class="block-slide"><img src="<?= $image; ?>" alt="Rus Lasa" /></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if($slider): ?>
        <div class="block-slider__arrows df-ce-ce w-100p">
          <button class="block-slider__arrow block-slider__arrow-prev"></button>
          <button class="block-slider__arrow block-slider__arrow-next"></button>
        </div>
      <?php endif; ?>

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
