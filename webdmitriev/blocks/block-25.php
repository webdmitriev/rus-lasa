<?php
/**
 * Conference - Block
 */

$block_path = 'block-25';
$gutenberg_title = 'Block - 25';

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

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

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
      <h2 class="sect_title">Вакансии</h2>

      <div id="affairs-filter">
        <form id="affairs-search-form">
          <input type="text" id="affairs-search" name="s" placeholder="Поиск по вакансиям...">

          <select id="affairs-categories" name="categories">
            <option value="">Категории</option>
            <?php
              $categories = get_terms(array('taxonomy' => 'affairs_categories', 'hide_empty' => false));
              foreach ($categories as $cat) {
                echo '<option value="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</option>';
              }
            ?>
          </select>
        </form>

        <div id="affairs-results"></div>
      </div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->

<?php if( !is_admin() ) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('affairs-search-form');
    const resultsContainer = document.getElementById('affairs-results');

    function fetchVacancies() {
        const formData = new FormData(form);
        formData.append('action', 'filter_affairs');

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            resultsContainer.innerHTML = html;
        })
        .catch(error => {
            console.error('Ошибка загрузки вакансий:', error);
        });
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        fetchVacancies();
    });

    form.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', fetchVacancies);
    });

    // 🟢 Загружаем все мероприятия при первой загрузке страницы
    fetchVacancies();
  });
</script>
<?php endif; ?>