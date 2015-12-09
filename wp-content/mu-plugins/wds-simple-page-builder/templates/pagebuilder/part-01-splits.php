<?php 
	global $post;
	$splits = get_post_meta( $post->ID, '_oasisla_uikit01_group', true );
?>

<?php if( $splits ) : ?>
	<section class="splits">
		<?php foreach ( (array) $splits as $key => $entry ) {
			$title 		= isset($entry['title']) ? $entry['title'] : null;
			$content 	= isset($entry['content']) ? $entry['content'] : null;
			$btn 			= isset($entry['btn']) ? $entry['btn'] : null;
			$btn_icon = isset($entry['btn_icon']) ? $entry['btn_icon'] : null;
			$link 		= isset($entry['link']) ? $entry['link'] : null;
			$image 		= isset($entry['image']) ? $entry['image'] : null;

			if( $btn_icon ) {
				$btn_class = 'btn--icon';
				$btn_icon  = '<i class="fa '. $btn_icon .'"></i>';
			}
			else {
				$btn_class = '';
				$btn_icon  = '';
			}
		?>
			<div class="split">
				<div class="split__bg">
					<img src="<?php echo $image; ?>" alt="">
				</div>
				<div class="container container--large">
					<div class="split__content">
						<h4 class="bold"><?php echo $title; ?></h4>
						<p><?php echo $content; ?></p>
						<?php if( $btn ): ?>
							<a href="<?php echo $link; ?>" class="btn btn--dark <?php echo $btn_class; ?>"><?php echo $btn_icon; ?><?php echo $btn; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>
<?php endif; ?>