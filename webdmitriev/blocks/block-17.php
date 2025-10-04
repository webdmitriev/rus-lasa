<?php
/**
 * Conference - Block
 */

$block_path = 'block-17';
$gutenberg_title = 'Block - 17';

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

$bgc      = get_field('bgc') ? get_field('bgc') : '--bg-gray-color';
$title    = wp_kses(get_field('title'), $allowed_tags);
$news     = get_field('news');
$btn_text = wp_kses(get_field('btn_text'), $allowed_tags);

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

      <?php if($title): ?><h2 class="sect_title"><?= $title; ?></h2><?php endif; ?>

      <div class="data-posts">
        <?php if( $news ): foreach( $news as $post): ?>
          <div class="post-item">
            <div class="post-date">
              <div class="post-date__num"><?= get_the_date('j', $post->ID); ?></div>
              <div class="post-date__month"><?= get_the_date('F', $post->ID); ?></div>
              <div class="post-date__year"><?= get_the_date('Y', $post->ID); ?></div>
            </div>
            <h3 class="post-title"><?= get_the_title($post->ID); ?></h3>
            <div class="post-excerpt"><?= get_field('excerpt', $post->ID); ?></div>
            <a href="<?php the_permalink($post->ID); ?>" class="post-link">Читать дальше</a>
          </div>
        <?php endforeach; endif; ?>
      </div>

      <?php if($btn_text): ?><button class="btn"><?= $btn_text; ?></button><?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
