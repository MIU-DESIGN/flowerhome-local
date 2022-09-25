<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no">

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

	<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->

	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="theme-color" content="#121212">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">

	<?php if (is_page(array('40'))) : ?>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" rel="stylesheet">
	<?php endif; ?>

	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-53GLZFR');
	</script>
	<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-53GLZFR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="container">

		<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

			<div id="inner-header" class="cf">

				<div class="inner">

					<p id="logo" class="logo h1" itemscope itemtype="http://schema.org/Organization">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/common/logo.png" alt="フラワーホーム">
						</a>
					</p>

					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

						<?php wp_nav_menu(array(
							'container' => false,
							'container_class' => 'menu cf',
							'menu' => __('The Main Menu', 'wpatheme'),
							'menu_class' => 'nav top-nav cf',
							'theme_location' => 'main-nav',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0,
							'fallback_cb' => ''
						)); ?>

					</nav>

					<a href="<?php echo esc_url(home_url('/')); ?>purchase/" class="header-btn link-btn01">不動産を売る</a>

				</div>
				<!--/.inner-->

			</div>
			<!--/#inner-header-->

		</header>
