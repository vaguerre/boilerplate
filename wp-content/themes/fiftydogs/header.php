<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	
	<!-- Typekit -->
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'pzs6xsn',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<header class="header">
		<div class="container">
			<a class="header__logo vert-center" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="" 
					src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo--white.png"
					srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo--white.png 1x,
									<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo--white@2x.png 2x">
			</a>

			<nav id="header__menu" class="header__menu">
				
				<?php 
					wp_nav_menu( array(
						'container'      => '',
						'menu_class'     => 'menu menu--transparent',
						'theme_location' => 'main_menu',
						'link_before'    => '',
						'link_after'     => '',
					) );
				?>
			</nav>
			<button type="button" role="button" aria-label="Toggle Navigation" id="header__toggle" class="header__toggle">
	      <span class="lines"></span>
	    </button>
		</div>
	</header>


	<div id="app" class="site-content">
