<?php
/**
 * Conference - Block
 */

$block_path = 'block-01';
$gutenberg_title = 'Block - 01';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$numAttr = rand(1, 100000);

?>

<!-- <?= $block_path; ?> (start) -->
<section class="<?= $block_path; ?>" data-bg="<?= $numAttr; ?>">
  <?php if( is_admin() ) : ?>
    <div class="gutenberg-block" style="display: block;max-width: 100%;padding: 10px;object-fit: contain;background-color: #ffffff;border: 1px solid #D1D1D1;">
      <img style="max-width: 100%;" src="<?= $url . '/webdmitriev/images/' . $block_path . '.jpg'; ?>" alt="Rus Lasa" />
    </div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="block-01-slider">
      <?php if( have_rows('sliders') ): while ( have_rows('sliders') ): the_row(); ?>
        <div class="block-01-slide">
          <?php if(get_sub_field('bg_576')): ?>
            <picture>
              <?php if(get_sub_field('bg_576')): ?><source srcset="<?= get_sub_field('bg_576'); ?>" type="image/jpeg" media="(max-width: 576px)"><?php endif; ?>
              <?php if(get_sub_field('bg_991')): ?><source srcset="<?= get_sub_field('bg_991'); ?>" type="image/jpeg" media="(max-width: 991px)"><?php endif; ?>
              <img class="block-bg" src="<?= get_sub_field('bg_1920'); ?>" alt="Alto" />
            </picture>
          <?php endif; ?>
          <div class="container">
            <div class="line-wrap df-sp-ce">
              <?php if(get_sub_field('icon')): ?><img src="<?= get_sub_field('icon'); ?>" alt="Rus Lasa" class="block-logotype" /><?php endif; ?>
              <div class="block-content" style="<?= get_sub_field('icon') ? '' : 'max-width: 100%'; ?>">
                <?php if(get_sub_field('title')): ?><h2 class="main_title"><?= get_sub_field('title'); ?></h2><?php endif; ?>
                <?php if(get_sub_field('sub_title')): ?><p class="sub_title"><?= get_sub_field('sub_title'); ?></p><?php endif; ?>
                <?php if(get_sub_field('descr')): ?><p class="descr"><?= get_sub_field('descr'); ?></p><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->