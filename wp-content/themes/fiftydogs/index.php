<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */

get_header(); ?>


<section class="hero hero--short">
	<div class="hero__inner">
		<h1>Blog</h1>
	</div>
</section>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container row">
				<ul class="ul--posts">
					<li>
						<a href="" class="post">
							<h4 class="post__title">Post Title</h4>
							<p class="post__excerpt">Post excerpt! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</a>
					</li>

					<li>
						<a href="" class="post">
							<h4 class="post__title">Post Title</h4>
							<p class="post__excerpt">Post excerpt! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</a>
					</li>
				</ul>
			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
