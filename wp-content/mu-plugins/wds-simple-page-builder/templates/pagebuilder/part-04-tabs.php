<?php 
	global $post;
	$slides 				= get_post_meta( $post->ID, '_oasisla_uikit04_group', true );
	$slides_title 		= get_post_meta( $post->ID, '_oasisla_uikit04_title', true );
	$slides_minheight = get_post_meta( $post->ID, '_oasisla_uikit04_minheight', true );

	// slides class
	if( $slides_minheight ) {
		$slides_minheight = 'slides-mh' . $slides_minheight;
	}
	else {
		$slides_minheight = '';
	}
?>

<?php if( $slides ): ?>
<section class="section--medium section--slides <?php echo $slides_minheight; ?>">
	<div class="slides-container row">
		<ul class="slides-nav" role="tablist">
			<?php

			if( $slides_title ) : ?>
				<h3 class="slides-title"><?php echo $slides_title; ?></h3>

			<?php endif;
			/**
			 * Tabs menu
			 */
			$count = 0;
			foreach ( (array) $slides as $key => $entry ) { 
				$count++;
				$title 		= isset($entry['title']) ? $entry['title'] : null;

				if( $count == 1 ) {
					$trigger_class = 'active';
				}
				else if( $count == 2 ) {
					$trigger_class = 'next';
				}
				else {
					$trigger_class = '';
				}
				// $content 	= isset($entry['content']) ? $entry['content'] : null;
				// $image 		= isset($entry['image']) ? $entry['image'] : null;
			?>

			<li class="<?php echo $trigger_class; ?>" role="tab">
				<a href="#slide<?php echo $count ; ?>"></a>
				<span><?php echo $title; ?></span>
			</li>
		<?php } ?>
		</ul>
		<div class="slides row">

			<?php 
			/**
			 * Tab Content
			 */
			$count = 0;
			foreach ( (array) $slides as $key => $entry ) { 
				$count++;
				$image 		= isset($entry['image']) ? $entry['image'] : null;
				$content  = isset($entry['content']) ? $entry['content'] : null;

				if( $count == 1 ) {
					$slide_class = 'tab--open';
				} else {
					$slide_class = '';
				}

				if( !$image ) {
					$slide_content_class = 'slide__content--alt';
				}
				else {
					$slide_content_class = '';
				}
			?>
			
				<div id="slide<?php echo $count; ?>" class="slide animated animated-duration-500 <?php echo $slide_class; ?>">
					<?php if( $image ) : ?>
						<div class="slide__image responsive-container">
							<img src="<?php echo $image; ?>" alt="">
						</div>
					<?php endif; ?>
					<div class="slide__content <?php echo $slide_content_class; ?> content-rte">
						<?php echo wpautop( $content ); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php endif; ?>