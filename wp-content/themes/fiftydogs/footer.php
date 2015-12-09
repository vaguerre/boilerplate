<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

	</div><!-- .site-content -->

	<footer id="footer" class="footer" role="contentinfo">
		<div class="container row text-center">
			<?php 
				wp_nav_menu( array(
					'container'      => '',
					'menu_class'     => 'menu menu--transparent menu--footer col-9',
					'theme_location' => 'footer_menu',
					'link_before'    => '',
					'link_after'     => '',
				) );
			?>
			<ul class="social-menu social-menu--footer col-3">
				<li class="social-menu__item"><a class="fa fa-twitter" href=""></a></li>
				<li class="social-menu__item"><a class="fa fa-facebook" href=""></a></li>
				<li class="social-menu__item"><a class="fa fa-instagram" href=""></a></li>
			</ul>
		</div>
	</footer>
	
</div><!-- #app -->

<div id="modals"></div>

<?php wp_footer(); ?>

</body>
</html>
