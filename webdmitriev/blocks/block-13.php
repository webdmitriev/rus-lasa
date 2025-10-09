<?php
/**
 * Conference - Block
 */

$block_path = 'block-13';
$gutenberg_title = 'Block - 13';

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

$text = wp_kses(get_field('text'), $allowed_tags);

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
      <?php if($text): ?><p class="descr"><?= $text; ?></p><?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
