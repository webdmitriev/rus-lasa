<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rus-lasa
 */

	$url = get_template_directory_uri();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?= $url; ?>/favicon.ico" type="image/x-icon">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<style>
		@keyframes preview {
			0% { opacity: 1; }
			40% { opacity: 1; }
			90% { opacity: 0; }
			100% { opacity: 0; }
		}
		.preview {
			position: fixed;
			top: 0;
			left: 0;
			display: none;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			align-content: center;
			width: 100%;
			height: 100%;
			background: var(--bg-gray-color) url("<?= $url; ?>/webdmitriev/assets/img/header/preview-1920.jpg") center / cover no-repeat;
			transition: all 0.4s ease;
			animation: preview 2.6s ease forwards;
			z-index: 1200;
		}
		.preview.active {
			display: flex;
		}
		.preview .preview__content {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			align-content: center;
			width: 100%;
			max-width: 980px;
			margin: 0 auto;
		}
		.preview .preview__content img {
			display: block;
			width: 244px;
			height: inherit;
		}
		.preview .preview__content .preview__content-text {
			display: block;
			width: 100%;
			max-width: calc(100% - 290px);
		}
		.preview .preview__content .preview__content-text .preview__suptitle {
			display: block;
			width: 100%;
			margin-bottom: 4px;
			font-family: "Roboto", sans-serif;
			font-weight: 500;
			font-size: 40px;
			line-height: 1.2;
			text-transform: capitalize;
			color: #fff;
		}
		.preview .preview__content .preview__content-text .preview__title {
			display: block;
			width: 100%;
			margin-bottom: 28px;
			font-family: "Roboto", sans-serif;
			font-weight: 500;
			font-size: 70px;
			line-height: 1.2;
			text-transform: capitalize;
			color: #fff;
		}
		.preview .preview__content .preview__content-text .preview__subtitle {
			display: block;
			width: 100%;
			font-family: "Roboto", sans-serif;
			font-weight: 500;
			font-size: 30px;
			line-height: 1.4;
			text-transform: capitalize;
			color: #fff;
		}

		@media (max-width: 1199px) {
			.preview {
				background: url("<?= $url; ?>/webdmitriev/assets/img/header/preview-1199.jpg") center / cover no-repeat;
			}
			.preview .preview__content {
				max-width: 680px;
			}
			.preview .preview__content img {
				width: 190px;
			}
			.preview .preview__content .preview__content-text {
				max-width: calc(100% - 240px);
			}
			.preview .preview__content .preview__content-text .preview__suptitle {
				font-size: 28px;
			}
			.preview .preview__content .preview__content-text .preview__title {
				margin-bottom: 10px;
				font-size: 54px;
			}
			.preview .preview__content .preview__content-text .preview__subtitle {
				font-size: 20px;
			}
		}
		@media (max-width: 991px) {
		}
		@media (max-width: 768px) {
			.preview .preview__content img {
				margin: 0 auto 24px auto;
			}
			.preview .preview__content .preview__content-text {
				max-width: 100%;
				text-align: center;
			}
		}
		@media (max-width: 576px) {
			.preview {
				background: url("<?= $url; ?>/webdmitriev/assets/img/header/preview-576.jpg") center / cover no-repeat;
			}
			.preview .preview__content img {
				width: 172px;
			}
			.preview .preview__content .preview__content-text .preview__suptitle {
				margin-bottom: 8px;
				font-size: 23px;
			}
			.preview .preview__content .preview__content-text .preview__title {
				font-size: 40px;
			}
			.preview .preview__content .preview__content-text .preview__subtitle {
				font-size: 18px;
			}
		}
		@media (max-width: 400px) {
			.preview .preview__content img {
				width: 162px;
			}
			.preview .preview__content .preview__content-text .preview__suptitle {
				margin-bottom: 5px;
				font-size: 18px;
			}
			.preview .preview__content .preview__content-text .preview__title {
				font-size: 34px;
			}
			.preview .preview__content .preview__content-text .preview__subtitle {
				font-size: 16px;
			}
		}
	</style>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const preview = document.getElementById('preview');
			const hasSeenPreview = localStorage.getItem('hasSeenPreview');

			if (!hasSeenPreview) {
				preview.classList.add("active")

				setTimeout(() => {
					preview.style.display = 'none';
					localStorage.setItem('hasSeenPreview', 'true');
				}, 2000);
			}
		});
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class("add-animation"); ?>>
<?php wp_body_open(); ?>


	<div id="app">

		<div class="preview" id="preview">
			<div class="container">
				<div class="preview__content">
					<img src="<?= $url; ?>/webdmitriev/assets/img/header/logo.svg" alt="Rus Lasa" />
					<div class="preview__content-text">
						<span class="preview__suptitle">Научная Школа Конференция</span>
						<span class="preview__title">Rus-LASA 2026</span>
						<span class="preview__subtitle">15 лет Ассоциации! <br/>москва, апрель</span>
					</div>
				</div>
			</div>
		</div>

		<header class="header">
			<div class="line-wrap df-sp-ce w-100p">
				<a href="<?php echo get_home_url( null, '/' ); ?>" class="header-logotype"><img src="<?= $url; ?>/webdmitriev/assets/img/header/header-logotype.svg" alt="Rus Lasa" /></a>

				<?php
					wp_nav_menu( [
						'theme_location'  => 'header-menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'header-menu df-ce-ce w-100p',
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

				<div class="header-contacts">
					<?php
						wp_nav_menu( [
							'theme_location'  => 'lang-menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'lang-menu df-fe-ce w-100p',
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

					<button class="burger-menu"><span></span></button>
				</div>
			</div>
		</header>

		<div class="header-mobile">
			<div class="header-mobile__content df-sp-fs w-100p scroll-line-none">
				<a href="<?php echo get_home_url( null, '/' ); ?>" class="header-logotype"><img src="<?= $url; ?>/webdmitriev/assets/img/header/header-logotype-green.svg" alt="Rus Lasa" /></a>
				<button class="close-menu"><span></span></button>

				<?php
					wp_nav_menu( [
						'theme_location'  => 'mobile-menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'mobile-menu',
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

				<?php
					wp_nav_menu( [
						'theme_location'  => 'lang-menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'lang-menu df-fs-fs w-100p',
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

			</div>
		</div>