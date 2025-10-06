<?php
/**
 * Conference - Block
 */

$block_path = 'block-14';
$gutenberg_title = 'Block - 14';

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
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenberg-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <!-- 🔍 Поиск -->
      <div class="data-search">
        <input type="text" id="search-input" placeholder="Поиск" />
      </div>

      <div class="data-controls">
        <!-- 📂 Категории -->
        <div class="data-select data-categories">
          <div class="data-header">
            <span class="select-label">Категория</span>
          </div>
          <div class="select-items">
            <?php
            $categories = get_categories(['orderby' => 'name', 'order' => 'ASC']);
            foreach ($categories as $cat) :
            ?>
              <div class="select-item">
                <?php echo esc_html($cat->name); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- 📅 Календарь -->
        <div class="data-select data-calendar">
          <div class="data-header">
            <span class="select-label">Дата</span>
          </div>
        </div>

        <!-- 🧹 Сброс фильтров -->
        <div class="data-select filter-reset" style="display: none;">
          <div class="data-header" id="reset-filters">
            <span class="select-label">Сбросить&nbsp;фильтры</span>
          </div>
        </div>

        <!-- 📌 Выбранные фильтры -->
        <div class="data-selected">
          <div class="selected-category"></div>
          <div class="selected-date"></div>
          <div class="selected-search"></div>
        </div>
      </div>

      <!-- 📰 Посты по умолчанию -->
      <div class="data-posts">
        <?php
        $default_posts = new WP_Query(['post_type' => 'post', 'posts_per_page' => 99]);
        if ($default_posts->have_posts()): while ($default_posts->have_posts()): $default_posts->the_post(); ?>
          <div class="post-item">
            <div class="post-date">
              <div class="post-date__num"><?= get_the_date('j'); ?></div>
              <div class="post-date__month"><?= get_the_date('F'); ?></div>
              <div class="post-date__year"><?= get_the_date('Y'); ?></div>
            </div>
            <h3 class="post-title"><?php the_title(); ?></h3>
            <div class="post-excerpt"><?= get_field('excerpt', get_the_ID()); ?></div>
            <a href="<?php the_permalink(); ?>" class="post-link">Читать дальше</a>
          </div>
        <?php endwhile;
          wp_reset_postdata();
        else:
          echo '<div class="not-found-posts"><p>Постов не найдено.</p></div>';
        endif;
        ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
