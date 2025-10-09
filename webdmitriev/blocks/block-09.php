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
$btn_is_link  = get_field('btn_is_link');
$btn_link     = esc_url(get_field('btn_link'));
$btn_popup    = get_field('btn_popup');

$btn_sub_text = wp_kses(get_field('btn_sub_text'), $allowed_tags);


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
      <div class="line-wrap df-ce-ce w-100p">
        <div class="block__image">
          <?php if($image): ?><img src="<?= $image; ?>" alt="Rus Lasa" /><?php endif; ?>
          <?php if($sum_people): ?><span class="descr" data-before="Нас уже:" data-after="человек(а)"><?= $sum_people; ?></span><?php endif; ?>
        </div>
        <div class="block__content">
          <?php if($btn_text): ?>
            <?php if($btn_is_link): ?>
              <a href="<?= $btn_link; ?>" target="_blank" rel="noopener noreferrer" class="btn"><?= $btn_text; ?></a>
            <?php else: ?>
              <button class="btn <?= $btn_popup; ?>"><?= $btn_text; ?></button>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($btn_sub_text): ?><p class="descr"><?= $btn_sub_text; ?></p><?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
