<?php 
	global $post;
	$uikit09c_bg 				= get_post_meta( $post->ID, '_oasisla_uikit09c_bg', true );
	$uikit09c_section 	= get_post_meta( $post->ID, '_oasisla_uikit09c_section', true );
	$uikit09c_container = get_post_meta( $post->ID, '_oasisla_uikit09c_container', true );
	$uikit09c_content   = get_post_meta( $post->ID, '_oasisla_uikit09c_content', true );
	$uikit09c_content   = apply_filters( 'the_content', $uikit09c_content );
?>
<section class="<?php echo $uikit09c_section . ' ' . $uikit09c_bg; ?>">
	<div class="container <?php echo $uikit09c_container; ?> row content-rte">
		<?php // echo wpautop( $uikit09c_content ); ?>
		<?php echo $uikit09c_content; ?>
	</div>
</section>