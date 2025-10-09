<?php
/**
 * Conference - Block
 */

$block_path = 'block-20';
$gutenberg_title = 'Block - 20';

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
    <div class="gutenberg-block" style="display: block;max-width: 100%;padding: 10px;object-fit: contain;background-color: #ffffff;border: 1px solid #D1D1D1;">
      <img style="max-width: 100%;" src="<?= $url . '/webdmitriev/images/' . $block_path . '.jpg'; ?>" alt="Rus Lasa" />
    </div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <h2 class="sect_title">Вакансии</h2>

      <div id="vacancy-filter">
        <form id="vacancy-search-form">
          <input type="text" id="vacancy-search" name="s" placeholder="Поиск по вакансиям...">

          <select id="vacancy-city" name="city">
            <option value="">Все города</option>
            <?php
              $cities = get_terms(array('taxonomy' => 'vacancy_city', 'hide_empty' => false));
              foreach ($cities as $city) {
                echo '<option value="' . esc_attr($city->slug) . '">' . esc_html($city->name) . '</option>';
              }
            ?>
          </select>

          <select id="vacancy-salary" name="salary">
            <option value="">Любая зарплата</option>
            <?php
              $salaries = get_terms(array('taxonomy' => 'vacancy_salary', 'hide_empty' => false));
              foreach ($salaries as $salary) {
                  echo '<option value="' . esc_attr($salary->slug) . '">' . esc_html($salary->name) . '</option>';
              }
            ?>
          </select>

          <select id="vacancy-title" name="title">
            <option value="">Все наименования</option>
            <?php
              $titles = get_terms(array('taxonomy' => 'vacancy_title', 'hide_empty' => false));
              foreach ($titles as $title) {
                  echo '<option value="' . esc_attr($title->slug) . '">' . esc_html($title->name) . '</option>';
              }
            ?>
          </select>
        </form>

        <div id="vacancy-results"></div>
      </div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->


<?php if( !is_admin() ) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('vacancy-search-form');
    const resultsContainer = document.getElementById('vacancy-results');

    function fetchVacancies() {
        const formData = new FormData(form);
        formData.append('action', 'filter_vacancies');

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

    // 🟢 Загружаем все вакансии при первой загрузке страницы
    fetchVacancies();
  });
</script>
<?php endif; ?>