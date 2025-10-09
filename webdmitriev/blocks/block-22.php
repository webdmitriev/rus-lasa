<?php
/**
 * Conference - Block
 */

$block_path = 'block-22';
$gutenberg_title = 'Block - 22';

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

$title      = wp_kses(get_field('title'), $allowed_tags);
$sub_title  = wp_kses(get_field('sub_title'), $allowed_tags);
$descr      = wp_kses(get_field('descr'), $allowed_tags);

$bg_1920    = get_field('bg_1920') ? "background: url(" . esc_url(get_field('bg_1920')) . ") center / cover no-repeat;filter: blur(".get_field('blur_1920')."px);"  : '';
$bg_991     = get_field('bg_991') ? "background: url(" . esc_url(get_field('bg_991')) . ") center / cover no-repeat;filter: blur(".get_field('blur_991')."px);"  : '';
$bg_576     = get_field('bg_576') ? "background: url(" . esc_url(get_field('bg_576')) . ") center / cover no-repeat;filter: blur(".get_field('blur_576')."px);"  : '';

$numAttr    = rand(1, 100000);

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>" data-bg="<?= $numAttr; ?>">
  <?php if( is_admin() ) : ?>
    <div class="gutenberg-block" style="display: block;max-width: 100%;padding: 10px;object-fit: contain;background-color: #ffffff;border: 1px solid #D1D1D1;">
      <img style="max-width: 100%;" src="<?= $url . '/webdmitriev/images/' . $block_path . '.jpg'; ?>" alt="Rus Lasa" />
    </div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="block-bg"></div>
    <div class="container">
      <div class="line-wrap">
        <?php if($title): ?><h2 class="sect_title"><?= $title; ?></h2><?php endif; ?>
        <?php if($sub_title): ?><p class="sub_title"><?= $sub_title; ?></p><?php endif; ?>
        <?php if($descr): ?><p class="descr"><?= $descr; ?></p><?php endif; ?>
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