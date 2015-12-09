<?php 
	global $post;
	$uikit02c_bg 				= get_post_meta( $post->ID, '_oasisla_uikit02c_bg', true );
	$uikit02c_text 			= get_post_meta( $post->ID, '_oasisla_uikit02c_text', true );
	$uikit02c_btn 			= get_post_meta( $post->ID, '_oasisla_uikit02c_btn', true );
	$uikit02c_btn_icon 	= get_post_meta( $post->ID, '_oasisla_uikit02c_btn_icon', true );
	$uikit02c_footer 		= get_post_meta( $post->ID, '_oasisla_uikit02c_footer', true );

	// Button cass
	$btn_class = [];

	if( $uikit02c_bg == 'bg-dark') {
		$btn_class = 'btn--light';
	}
	else {
		$btn_class = 'btn--dark';
	}
	if( $uikit02c_btn_icon ) {
		$btn_class = $btn_class . ' btn--icon';
		$btn_icon  = '<i class="fa '. $uikit02c_btn_icon .'"></i>';
	}
 ?>
<section class="callout section-padded--large <?php echo $uikit02c_bg; ?>">
	<div class="container text-center row">
		<div class="col-10 col-push-1">
			<h3><?php echo $uikit02c_text; ?></h3>

			<?php if( $uikit02c_btn ): ?>
				<a href="" class="btn <?php echo $btn_class; ?>"><?php echo $btn_icon; ?><?php echo $uikit02c_btn; ?></a>
			<?php endif; ?>

			<?php if( $uikit02c_footer ) : ?>
				<footer class="callout__footer content-rte">
					<p><?php echo $uikit02c_footer; ?></p>
				</footer>
			<?php endif; ?>
		</div>
	</div>
</section>