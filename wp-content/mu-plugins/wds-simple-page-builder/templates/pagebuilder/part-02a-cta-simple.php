<?php 
	global $post;
	$uikit02a_bg 				= get_post_meta( $post->ID, '_oasisla_uikit02a_bg', true );
	$uikit02a_text 			= get_post_meta( $post->ID, '_oasisla_uikit02a_text', true );
	$uikit02a_btn 			= get_post_meta( $post->ID, '_oasisla_uikit02a_btn', true );
	$uikit02a_btn_icon 	= get_post_meta( $post->ID, '_oasisla_uikit02a_btn_icon', true );
	$uikit02a_footer 		= get_post_meta( $post->ID, '_oasisla_uikit02a_footer', true );

	// Button cass
	$btn_class = [];

	if( $uikit02a_bg == 'bg-dark') {
		$btn_class = 'btn--light';
	}
	else {
		$btn_class = 'btn--dark';
	}
	if( $uikit02a_btn_icon ) {
		$btn_class = $btn_class . ' btn--icon';
		$btn_icon  = '<i class="fa '. $uikit02a_btn_icon .'"></i>';
	}
 ?>
<section class="callout section-padded--large <?php echo $uikit02a_bg; ?>">
	<div class="container text-center row">
		<div class="col-10 col-push-1">
			<h3><?php echo $uikit02a_text; ?></h3>

			<?php if( $uikit02a_btn ): ?>
				<a href="" class="btn <?php echo $btn_class; ?>"><?php echo $btn_icon; ?><?php echo $uikit02a_btn; ?></a>
			<?php endif; ?>

			<?php if( $uikit02a_footer ) : ?>
				<footer class="callout__footer content-rte">
					<p><?php echo $uikit02a_footer; ?></p>
				</footer>
			<?php endif; ?>
		</div>
	</div>
</section>