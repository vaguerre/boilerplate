<?php 
	global $post;
	$count = 0;
	$cta_thirds_header 	= get_post_meta( $post->ID, '_oasisla_uikit06_header', true );
	$cta_thirds 				= get_post_meta( $post->ID, '_oasisla_uikit06_group', true );

	// Fallbacks
	$cta_thirds_header 	= empty($cta_thirds_header) ? 'Learn More' : $cta_thirds_header;
?>

<div class="section-padded callout bg-dark">
	<div class="container text-center">
		<h3><?php echo $cta_thirds_header; ?></h3>
	</div>
</div>

<section class="section-padded section-thirds">
	<div class="container">
		<div class="row">
			<?php 
			/**
			 * About Subitems
			 */
			foreach ( (array) $cta_thirds as $key => $entry ) { 
				$count++;
				$title 		= isset($entry['title']) ? $entry['title'] : null;
				$content 	= isset($entry['content']) ? $entry['content'] : null;
				$btn 			= isset($entry['btn']) ? $entry['btn'] : null;
				$btn_icon = isset($entry['btn_icon']) ? $entry['btn_icon'] : null;
				$link 		= isset($entry['link']) ? $entry['link'] : null;
				
				if( $btn_icon ) {
					$btn_class = 'btn--icon';
					$btn_icon  = '<i class="fa '. $btn_icon .'"></i>';
				}
			?>

				<div class="cta-third">
					<h4 class="cta-third__title"><?php echo $title; ?></h4>
					<p><?php echo $content; ?></p>
					
					<?php if( $btn ) : ?>
						<a href="<?php echo $link; ?>" class="btn btn--dark <?php echo $btn_class; ?>"><?php echo $btn_icon; ?><?php echo $btn; ?></a>
					<?php endif; ?>
				</div>
			<?php if( $count % 3 == 0 ) { ?>
				</div><div class="row">
			<?php } ?>
		<?php } ?>
	</div>
	</div>
</section>