<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#752D79">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Main styles -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="//use.typekit.net/hjy2stt.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
	    <style>
	    header, .hero-container, .container, footer, .footer-bar {
	        display: none;
	    }
	    </style>
	    <div class="no-support island">
	        <h3>Unfortunately this website is not accessible via the browser you're currently using.</h3> 
	        <p class="intro">We recommend upgrading your browser. You can find more information about browsers and upgrading <a href="http://www.whatbrowser.org/intl/en_uk/">here</a></p>
	    </div>
	<![endif]-->
	<div class="fade-overlay"></div>
	<header>
		<div class="layout-width">
			<nav class="main-nav">
				<?php wp_nav_menu( array('menu' => 'The Main Menu', 'container' => false )); ?>
			</nav>
			<h2 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
			<p class="toggle-menu"><a href="javascript:;"><i class="fa fa-bars"></i><i class="fa fa-times"></i></a></p>
		</div>
	</header>
