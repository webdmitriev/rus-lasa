<?php
/**
 * Conference - Block
 */

$block_path = 'block-05';
$gutenberg_title = 'Block - 05';

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

$bgc      = get_field('bgc') ? get_field('bgc') : '--bg-gray-color';
$image    = esc_url(get_field('image'));
$elements = get_field('elements'); // name, rule

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>" style="background-color: var(<?= $bgc; ?>)">
  <?php if( is_admin() ) : ?>
    <div class="gutenberg-block" style="display: block;max-width: 100%;padding: 10px;object-fit: contain;background-color: #ffffff;border: 1px solid #D1D1D1;">
      <img style="max-width: 100%;" src="<?= $url . '/webdmitriev/images/' . $block_path . '.jpg'; ?>" alt="Rus Lasa" />
    </div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <?php if($image): ?><img src="<?= $image; ?>" alt="Rus Lasa" class="img" /><?php endif; ?>
      <div class="items__ul df-sp-fs w-100p">
        <?php if( have_rows('elements') ): while ( have_rows('elements') ): the_row(); ?>
          <div class="items__li">
            <span class="items__li-name"><?= get_sub_field('name'); ?></span>
            <span class="items__li-rule"><?= get_sub_field('rule'); ?></span>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
