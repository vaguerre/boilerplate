<?php 
	global $post;

	$faqs 			=	get_post_meta( $post->ID, '_oasisla_uikit08_group', true );
	$faq_header = get_post_meta( $post->ID, '_oasisla_uikit08_header', true );
?>

<?php if( $faqs ): ?>
<section class="section-faqs">
	<div class="container row">
		<?php if( $faq_header ): ?>
			<h3><?php echo $faq_header; ?></h3>
		<?php endif; ?>

		<ul>
			<?php 
			/**
			 * Tab Content
			 */
			$count = 0;
			foreach ( (array) $faqs as $key => $entry ) { 
				$count++;
				$question 	= isset($entry['question']) ? $entry['question'] : null;
				$answer  		= isset($entry['answer']) ? $entry['answer'] : null;
			?>
			
				<li id="faq<?php echo $count; ?>" class="faq">
					<div class="faq__question">
						<h4><?php echo $question; ?></h4>
						<span class="caret"></span>
					</div>
					<div class="faq__answer content-rte">
						<?php echo wpautop( $answer ); ?>
					</div>
				</li>
			<?php } ?>
		</ul>

	</div>
</section>
<?php endif; ?>