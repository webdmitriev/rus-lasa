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

$btn_text     = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_is_link  = get_field('btn_is_link');
$btn_link     = esc_url(get_field('btn_link'));
$btn_popup    = get_field('btn_popup');

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
