<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rus-lasa
 */

	$url 		= get_template_directory_uri();
	$image 	= esc_url(get_field('image', 'option'));

?>

		<footer class="footer">
			<div class="container">
				<?php
					wp_nav_menu( [
						'theme_location'  => 'footer-menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'footer-menu df-ce-ce w-100p',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					] );
				?>

				<div class="line-wrap">
					<img src="<?= $url; ?>/webdmitriev/assets/img/footer/footer-image-01.png" alt="Rus Lasa" class="form-image" />
					<?= do_shortcode('[contact-form-7 id="c49527a" title="Footer form"]'); ?>
				</div>
			</div>

			<div class="footer__bottom d-block w-100p">
				<div class="line-wrap df-sp-ce w-100p">
					<p class="descr">&copy; <?php echo date('Y'); ?> Rus-LASA</p>
					<div class="footer__bottom-contacts df-fe-ce w-100p">
						<a href="mailto:info@ruslasa.ru" class="footer-email">info@ruslasa.ru</a>
						<a href="#" target="_blank" rel="noopener noreferrer" class="footer-social"><img src="<?= $url; ?>/webdmitriev/assets/img/icons/icon-linked.svg" alt="Rus Lasa" /></a>
						<a href="#" target="_blank" rel="noopener noreferrer" class="footer-social"><img src="<?= $url; ?>/webdmitriev/assets/img/icons/icon-tg.svg" alt="Rus Lasa" /></a>
						<a href="#" target="_blank" rel="noopener noreferrer" class="footer-social"><img src="<?= $url; ?>/webdmitriev/assets/img/icons/icon-email.svg" alt="Rus Lasa" /></a>
					</div>
				</div>
			</div>
		</footer>

		<?php get_template_part('webdmitriev/popup'); ?>

	</div>

<?php wp_footer(); ?>

</body>
</html>
