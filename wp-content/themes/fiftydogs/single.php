<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section class="hero hero--short">
		<div class="hero__inner">
			<h1 class="h2">Post Title</h1>
		</div>
	</section>


	<section class="section section--single section--vh">
		<div class="container">


			<?php 
			/*
			 * @todo Post content
			 */
			?>
			<div class="post-content row">
				<h3>Post content</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales augue vitae eros fermentum, vel semper sem ullamcorper. Phasellus mollis libero quis pretium suscipit. Phasellus dapibus risus nec felis pulvinar, quis dictum odio suscipit. Duis eget libero augue. Sed cursus eros et neque euismod, at maximus est lobortis. Aliquam erat volutpat. Nam turpis eros, sollicitudin in finibus eget, ullamcorper nec justo. Aliquam a magna est. Sed porttitor auctor enim, et cursus erat faucibus id. Nullam id auctor dolor. Nam fermentum lacus fermentum enim gravida, ac mattis tortor gravida. Proin orci turpis, pulvinar sagittis auctor et, auctor ac leo.</p> 
				<p>Ut sit amet nulla quis ante consectetur molestie. Vestibulum vel eleifend purus. Etiam vel venenatis ligula. Donec viverra nisi sit amet nunc placerat, egestas malesuada augue posuere. Vivamus est ex, molestie congue ex non, molestie viverra felis. Suspendisse ut fringilla nibh. Nulla iaculis ligula quis lacinia gravida. Duis cursus eros consequat neque molestie, sed fermentum ex maximus. Ut aliquet pulvinar dictum. Suspendisse scelerisque dui in eleifend iaculis. Sed fermentum egestas auctor.</p> 
			</div>



			<?php 
			/*
			 * Comments
			 * If comments are open or we have at least one comment, load up the comment template.
			 */
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php
				/*
				 * Post navigation
				 */
				the_post_navigation( array(
					'next_text' => '<span class="screen-reader-text">Next</span> ' .
						'<span class="post-title">%title</span>' .
						'<span class="meta-nav" aria-hidden="true"><i class="fa fa-angle-right"></i></span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fa fa-angle-left"></i></span> ' .
						'<span class="screen-reader-text">Previous</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>

		</div>
	</section>

<?php get_footer(); ?>
