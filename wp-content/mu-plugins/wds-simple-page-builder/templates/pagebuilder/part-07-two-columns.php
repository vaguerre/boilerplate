<?php 
	global $post;
	$column_left 	= get_post_meta( $post->ID, '_oasisla_uikit07_left', true );
	$column_right = get_post_meta( $post->ID, '_oasisla_uikit07_right', true );
?>

<section class="section-half-text section--xlarge">
	<div class="container container--large">
		<div class="row">
			<div class="half-text col-5 col-push-1 content-rte">
				<?php echo wpautop( $column_left ); ?>
			</div>
			<div class="half-text col-5 col-push-1 content-rte">
				<?php echo wpautop( $column_right ); ?>
			</div>
			<div class="half-text__divider"></div>
		</div>
	</div>
</section>