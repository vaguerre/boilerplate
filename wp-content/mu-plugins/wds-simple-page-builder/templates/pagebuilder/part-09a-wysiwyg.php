<?php 
	global $post;
	$uikit09a_bg 				= get_post_meta( $post->ID, '_oasisla_uikit09a_bg', true );
	$uikit09a_section 	= get_post_meta( $post->ID, '_oasisla_uikit09a_section', true );
	$uikit09a_container = get_post_meta( $post->ID, '_oasisla_uikit09a_container', true );
	$uikit09a_content   = get_post_meta( $post->ID, '_oasisla_uikit09a_content', true );
	$uikit09a_content   = apply_filters( 'the_content', $uikit09a_content );
?>
<section class="<?php echo $uikit09a_section . ' ' . $uikit09a_bg; ?>">
	<div class="container <?php echo $uikit09a_container; ?> row content-rte">
		<?php //echo wpautop( $uikit09a_content ); ?>
		<?php echo $uikit09a_content; ?>
	</div>
</section>