<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title>
		<?php if ( is_category() ) {
			echo __('Category Archive for &quot;', 'theme1918'); single_cat_title(); echo __('&quot; | ', 'theme1918'); bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo __('Tag Archive for &quot;', 'theme1918'); single_tag_title(); echo __('&quot; | ', 'theme1918'); bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(''); echo __(' Archive | ', 'theme1918'); bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo __('Search for &quot;', 'theme1918').wp_specialchars($s).__('&quot; | ', 'theme1918'); bloginfo( 'name' );
		} elseif ( is_home() || is_front_page()) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		} elseif ( is_404() ) {
			echo __('Error 404 Not Found | ', 'theme1918'); bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title('');
		} else {
			echo wp_title( ' | ', false, right ); bloginfo( 'name' );
		} ?>
	</title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if(of_get_option('favicon') != ''){ ?>
		<link rel="icon" href="<?php echo of_get_option('favicon', "" ); ?>" type="image/x-icon">
	<?php } else { ?>
		<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon">
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/skeleton.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/flexslider.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/touchTouch.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/768.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/480.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/320.css">
	<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
	
	<!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
		<style>
			<?php echo of_get_option('custom_css' ) ?>
		</style>
	<?php }?>

	<style type="text/css">
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background:'.$header_styling.'}';
			}
		?>
		
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a, .link{color:'.$links_styling.'}';
			}
		?>
	</style>

	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
	
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="">
			</a>
		</div>
	<![endif]-->
	<!--[if lt IE 9]>
		<style type="text/css">
			.flex-control-nav li a, #slides .pagination li,
			.before-content-area .widget-area1 .circle,
			.before-content-area .widget-area2 .circle,
			.before-content-area .widget-area3 .circle,
			.tabs .tab-menu a,
			.frame, .frame img, .featured-thumbnail, .featured-thumbnail img,
			blockquote,
			.recent-posts.our-team li, .recent-posts.solutions li, #gallery .portfolio li,
			.pagenavi span, .pagenavi a,
			.wpcf7-form p.field input[type="text"], .wpcf7-form textarea, .wpcf7-not-valid-tip {behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php);}
		</style>
	<![endif]-->

	<script type="text/javascript">
		// initialise plugins
			jQuery(function(){
				// main navigation init
				jQuery('ul.sf-menu').superfish({
					delay:			<?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
					animation:		{opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
					speed:			'<?php echo of_get_option('sf_speed'); ?>',		// faster animation speed 
					autoArrows:		<?php echo of_get_option('sf_arrows'); ?>,		// generation of arrow mark-up (for submenu) 
					dropShadows:	false
				});
			});
	</script>

</head>

<body <?php body_class(); ?>>
	<div id="main"><!-- this encompasses the entire Web site -->
		<header id="header">
			<div class="container_12 clearfix">
				<div class="grid_12">
					<div class="clearfix">
						<div class="logo">
							<?php if(of_get_option('logo_type') == 'text_logo'){
								if( is_front_page() || is_home() || is_404() ) {?>
									<h1 class="txt-logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
								<?php } else { ?>
									<h1 class="txt-logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
								<?php }
							} else {
								if(of_get_option('logo_url') != ''){ ?>
									<h1 class="img-logo"><a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a></h1>
								<?php } else { ?>
									<h1 class="img-logo"><a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a></h1>
								<?php }
							}?>
							<div class="tagline"><?php bloginfo('description'); ?><br>
							<h3>1-(800)444-44444</h3></div>
						</div> <!-- /logo-->
						<nav class="primary">
						<!-- <ul id="topnav" class="sf-menu sf-js-enabled">
							<li id="menu-item-205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-205">
								<a href="http://localhost/batter-up/">Home</a>
							</li>
							<li id="menu-item-205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-205">
								<a href="http://localhost/batter-up/">Who Are We</a>
							</li>
							<li id="menu-item-205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-205">
								<a href="http://localhost/batter-up/">Contact</a>
							</li>
							<li id="menu-item-205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-205">
								<a href="http://localhost/batter-up/">Products</a>
							</li>
						</ul> -->
 							<?php wp_nav_menu( array(
								'container'			=> 'ul', 
								'menu_class'		=> 'sf-menu', 
								'menu_id'			=> 'topnav',
								'depth'				=> 0,
								'theme_location'	=> 'header_menu' 
							)); ?>
						</nav><!--/primary-->
						<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>
							<div id="top-search">
								<form method="get" action="<?php echo get_option('home'); ?>/">
									<input type="text" name="s" class="input-search"/><input type="submit" value="<?php _e('GO', 'theme1918'); ?>" id="submit">
								</form>
							</div>
						<?php } ?>
					</div> <!--/clearfix-->
					
					<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?>
						<div id="widget-header">
							<!-- Wigitized Header -->
						</div><!--/widget-header-->
					<?php endif ?>
				</div> <!--/grid_12-->
			</div><!--/container_12-->
		</header>
		<?php if( is_front_page() ) { ?>
			<section id="slider-wrapper">
				<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
			</section><!--/slider-->
		<?php } ?>
		<div class="primary_content_wrap">
			<div class="container_12 clearfix">