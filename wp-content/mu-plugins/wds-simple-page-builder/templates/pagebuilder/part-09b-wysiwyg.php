<?php 
	global $post;
	$uikit09b_bg 				= get_post_meta( $post->ID, '_oasisla_uikit09b_bg', true );
	$uikit09b_section 	= get_post_meta( $post->ID, '_oasisla_uikit09b_section', true );
	$uikit09b_container = get_post_meta( $post->ID, '_oasisla_uikit09b_container', true );
	$uikit09b_content   = get_post_meta( $post->ID, '_oasisla_uikit09b_content', true );
	$uikit09b_content   = apply_filters( 'the_content', $uikit09b_content );
?>
<section class="<?php echo $uikit09b_section . ' ' . $uikit09b_bg; ?>">
	<div class="container <?php echo $uikit09b_container; ?> row content-rte">
		<?php // echo wpautop( $uikit09b_content ); ?>
		<?php echo $uikit09b_content; ?>
	</div>
</section>