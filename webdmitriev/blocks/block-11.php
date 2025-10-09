<?php
/**
 * Conference - Block
 */

$block_path = 'block-11';
$gutenberg_title = 'Block - 11';

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

$posts = get_field('posts'); // title, image, descr, btn_text, btn_is_link, btn_link, btn_popup

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
      <?php if( have_rows('posts') ): while ( have_rows('posts') ): the_row(); ?>
        <div class="block__post df-sp-fs w-100p">
          <img src="<?= get_sub_field('image') ? get_sub_field('image') : $image_base64; ?>" alt="Rus Lasa" />
          <div class="block__post-content">
            <?php if(get_sub_field('title')): ?><span class="block__post-content__title"><?= get_sub_field('title'); ?></span><?php endif; ?>
            <?php if(get_sub_field('descr')): ?><span class="block__post-content__descr"><?= get_sub_field('descr'); ?></span><?php endif; ?>

            <?php if(get_sub_field('btn_text')): ?>
              <?php if(get_sub_field('btn_is_link')): ?>
                <a href="<?= get_sub_field('btn_link'); ?>" target="_blank" rel="noopener noreferrer" class="btn"><?= get_sub_field('btn_text'); ?></a>
              <?php else: ?>
                <button class="btn <?= get_sub_field('btn_popup'); ?>"><?= get_sub_field('btn_text'); ?></button>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
