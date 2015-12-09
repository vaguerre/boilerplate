<?php 
	global $post;
	$uikit05_header 		= get_post_meta( $post->ID, '_oasisla_uikit05_header', true );
	$uikit05_cta01 			= get_post_meta( $post->ID, '_oasisla_uikit05_cta01', true );
	$uikit05_cta01_link = get_post_meta( $post->ID, '_oasisla_uikit05_cta01_link', true );
	$uikit05_cta01_bg 	= get_post_meta( $post->ID, '_oasisla_uikit05_cta01_bg', true );
	$uikit05_cta02 			= get_post_meta( $post->ID, '_oasisla_uikit05_cta02', true );
	$uikit05_cta02_link = get_post_meta( $post->ID, '_oasisla_uikit05_cta02_link', true );
	$uikit05_cta02_bg 	= get_post_meta( $post->ID, '_oasisla_uikit05_cta02_bg', true );
	$uikit05_cta03 			= get_post_meta( $post->ID, '_oasisla_uikit05_cta03', true );
	$uikit05_cta03_link = get_post_meta( $post->ID, '_oasisla_uikit05_cta03_link', true );
	$uikit05_cta03_bg 	= get_post_meta( $post->ID, '_oasisla_uikit05_cta03_bg', true );
	$uikit05_cta04 			= get_post_meta( $post->ID, '_oasisla_uikit05_cta04', true );
	$uikit05_cta04_link = get_post_meta( $post->ID, '_oasisla_uikit05_cta04_link', true );
	$uikit05_cta04_bg 	= get_post_meta( $post->ID, '_oasisla_uikit05_cta04_bg', true );
?>

<section class="ctas">
	<?php if( $uikit05_header ): ?>
		<div class="container row text-center">
			<div class="col-10 col-push-1">
				<h3><?php echo $uikit05_header; ?></h3>
			</div>
		</div>
	<?php endif; ?>

	<div class="box-wrapper">
		<a class="box" href="<?php echo $uikit05_cta01_link; ?>">
		  <div class="box__border"></div>
		  <div class="box__circle" style="background-image:url(<?php echo $uikit05_cta01_bg; ?>);">
		  	<div>
		  		<span><?php echo $uikit05_cta01; ?></span>
		  	</div>
		  </div>
		</a>
		<a class="box" href="<?php echo $uikit05_cta02_link; ?>">
		  <div class="box__border"></div>
		  <div class="box__circle" style="background-image:url(<?php echo $uikit05_cta02_bg; ?>);">
		  	<div>
		  		<span><?php echo $uikit05_cta02; ?></span>
		  	</div>
		  </div>
		</a>
		<a class="box" href="<?php echo $uikit05_cta03_link; ?>">
		  <div class="box__border"></div>
		  <div class="box__circle" style="background-image:url(<?php echo $uikit05_cta03_bg; ?>);">
		  	<div>
		  		<span><?php echo $uikit05_cta03; ?></span>
		  	</div>
		  </div>
		</a>
		<a class="box" href="<?php echo $uikit05_cta04_link; ?>">
		  <div class="box__border"></div>
		  <div class="box__circle" style="background-image:url(<?php echo $uikit05_cta04_bg; ?>);">
		  	<div>
		  		<span><?php echo $uikit05_cta04; ?></span>
		  	</div>
		  </div>
		</a>
	</div>
</section>