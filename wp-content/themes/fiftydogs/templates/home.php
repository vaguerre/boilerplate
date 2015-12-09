<?php
/**
 * Template Name: Home
 */
get_header(); ?>



<?php
	/*
	 * Hero
	 */
	$hero_title_alt = get_post_meta( $post->ID, '_interntest_hero_title_alt', true );
	$hero_subtitle 	= get_post_meta( $post->ID, '_interntest_hero_subtitle', true );

	// Fallbacks
	$hero_title 		= !empty( $hero_title_alt ) ? $hero_title_alt : get_the_title();
	$hero_subtitle 	= !empty( $hero_subtitle ) ? '<h2 class="h3 alt">' . $hero_subtitle . '</h2>' : null;

	// Hero class 
	if( has_post_thumbnail() ) {
		$hero_class 	= 'hero--with-bg';
	}
	else {
		$hero_class 	= 'hero--short';
	}
?>

<section class="hero <?php echo $hero_class; ?>">
	<?php
	// If has featured image
	if( has_post_thumbnail() ) :
	  $images = array(
      'retina'  	=> wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero-image-2x' ),
      'default' 	=> wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero-image-1x' ),
    );
  ?>
    <img class="responsive-img hero__bg" style=""
      src="<?php echo $images['default'][0]; ?>" 
      srcset="<?php echo $images['default'][0]; ?> 1x,
              <?php echo $images['retina'][0]; ?> 2x">
	<?php endif; ?>

	<div class="hero__inner">
		<h1><?php echo $hero_title; ?></h1>
		<?php echo $hero_subtitle; ?>
	</div>
</section>




<?php 
/**
 * @todo Page Content
 * Default Loop
 * https://codex.wordpress.org/The_Loop
 */
?>
<section class="section section--large">
	<div class="container container--med text-center">
		<h3>Here is something interesting</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio sapiente eum, corrupti at esse magnam soluta quo mollitia adipisci in perferendis. Culpa fuga adipisci quas quis voluptas quibusdam, ratione id.</p>
	</div>
</section>


<?php 
/*
 * @todo Featured Dogs
 */
?>
<section>
	<div class="row">
		<div class="dog">
			<div class="dog__bg">
				<img class=""
				  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dogs/brutus@1x.jpg">
			</div>
			<div class="inner">
				<h4 class="dog__title">Brutus</h4>
				<span class="dog__sep"></span>
				<p class="dog__desc">5 yrs, Boxer</p>
			</div>
		</div>

		<div class="dog">
			<div class="dog__bg">
				<img class=""
				  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dogs/brutus@1x.jpg">
			</div>
			<div class="inner">
				<h4 class="dog__title">Brutus</h4>
				<span class="dog__sep"></span>
				<p class="dog__desc">5 yrs, Boxer</p>
			</div>
		</div>

		<div class="dog">
			<div class="dog__bg">
				<img class=""
				  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dogs/brutus@1x.jpg">
			</div>
			<div class="inner">
				<h4 class="dog__title">Brutus</h4>
				<span class="dog__sep"></span>
				<p class="dog__desc">5 yrs, Boxer</p>
			</div>
		</div>

		<div class="dog">
			<div class="dog__bg">
				<img class=""
				  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dogs/brutus@1x.jpg">
			</div>
			<div class="inner">
				<h4 class="dog__title">Brutus</h4>
				<span class="dog__sep"></span>
				<p class="dog__desc">5 yrs, Boxer</p>
			</div>
		</div>
	</div>
</section>



<section class="section--large">
	<div class="container text-center">
		<header class="section__header">
			<h3>More Cool Stuff Here</h3>
		</header>
		<div class="row">
			<div class="cta col-4">
				<h4>Some Page</h4>
				<p>Short description</p>
				<a href="" class="btn btn--primary">Learn More</a>
			</div>
			<div class="cta col-4">
				<h4>Some Other Page</h4>
				<p>Short description</p>
				<a href="" class="btn btn--primary">Learn More</a>
			</div>
			<div class="cta col-4">
				<h4>Another Page</h4>
				<p>Short description</p>
				<a href="" class="btn btn--primary">Learn More</a>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>