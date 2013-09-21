<!DOCTYPE html>
	<!-- saved from url=(0014)about:internet -->
	<!--[if lt IE 7]> <html itemscope itemtype="http://schema.org/Blog" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="<?php bloginfo('language'); ?>" <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7 ]>    <html itemscope itemtype="http://schema.org/Blog" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="<?php bloginfo('language'); ?>" <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8 ]>    <html itemscope itemtype="http://schema.org/Blog" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="<?php bloginfo('language'); ?>" <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html itemscope itemtype="http://schema.org/Blog" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="<?php bloginfo('language'); ?>" <?php language_attributes(); ?> class="no-js">	<!--<![endif]-->
	
	<head>
		<?php
			$header_image = get_header_image();
			
			if(has_post_thumbnail()){
				$meta_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
			} else {
				$meta_image = $header_image;
			}
		?>
		<!--Meta Tags-->
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="language" content="<?php bloginfo('language'); ?>" />
		
		<!--IE-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />
		<meta name="msapplication-tooltip" content="<?php bloginfo('name'); ?>" />
		<meta http-equiv="Page-Enter" content="blendTrans(duration=0)" />
		<meta http-equiv="Page-Exit" content="blendTrans(duration=0)" />
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
		
		<!--Mobile-->
		<meta name="viewport" content="width=device-width" />
		
		<!--Schema.org microdata-->
		<meta itemprop="name" content="<?php wp_title('', ' - '); ?>">
		<meta itemprop="image" content="<?php echo $meta_image; ?>" />
		
		<!--Styles-->
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory');?>/styles/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory');?>/styles/app.css" />
		
		<!--Scripts-->
		<?php 
			if( !is_admin()){
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}

			wp_head();
		?>
		<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory');?>/scripts/jquery.js"  charset="utf-8"><\/script>')</script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/scripts/modernizr.js" charset="utf-8"></script>
		
		<!-- Feeds -->
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		
		<!--Favicons-->
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" />
		<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory');?>/apple-touch-icon.png" />
		
		<!-- Misc -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<!--Title-->
		<title><?php wp_title(' - ', true); ?></title>
	</head>
	<body <?php body_class($post->post_name); ?>>
		<!--container-->
		<div id="container">
			<!--header-->
			<header id="header">
				<?php
					if ( ! empty( $header_image ) ) {
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo">
						<img src="<?php echo esc_url( $header_image ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo('name') . ' - ' . get_bloginfo('description') ; ?>" title="" />
					</a>
				<?php } ?>
				<hgroup>
					<h2 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<h3 id="site-description"><?php bloginfo( 'description' ); ?></h3>
				</hgroup>
				
				<!-- navigation -->
				<?php wp_nav_menu(
					array(
						'container' => 'nav',
						'menu' => 'Navigation'
					)
				); ?>
				<!-- /navigation -->
			</header>
			<!--/header-->
			
			<!--content-->
			<div id="content">