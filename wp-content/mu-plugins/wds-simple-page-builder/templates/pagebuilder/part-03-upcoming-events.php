<?php global $post; ?>

<?php
	$events_title 		= get_post_meta( $post->ID, '_oasisla_uikit_events_title', true );
	$events_subtitle 	= get_post_meta( $post->ID, '_oasisla_uikit_events_subtitle', true );
	$event_ids 				= get_post_meta( $post->ID, '_oasisla_uikit_events', true );

  $args = array(
    'post_type'     => 'oasisla_events',
    'post__in'      => $event_ids,
    'nopagig'       => true,
    'no_found_rows' => true //only use if not paginating results
  );
  $events = new WP_Query( $args ); ?>

<?php if( $events->have_posts() ) : ?>
	<section class="section section-upcoming section--xxlarge">
		<div class="container">
			<?php if( $events_title || $events_subtitle ): ?>
				<div class="section__header">
					<?php if( $events_title ): ?>
						<h2 class="m0"><?php echo $events_title; ?></h2>
					<?php endif; ?>

					<?php if( $events_subtitle ): ?>
						<h5 class="m0"><?php echo $events_subtitle; ?></h5>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php while( $events->have_posts() ) : $events->the_post(); ?>
				<?php
					$event_date = get_post_meta( $post->ID, '_oasisla_event_date', true );
					$event_time = get_post_meta( $post->ID, '_oasisla_event_time', true );
					$terms 			= get_the_terms( $post->ID, 'oasisla_events_category' );

					// Taxonomy terms
					if ( $terms && ! is_wp_error( $terms ) ) {
						$event_terms_array = array();

						foreach ( $terms as $term ) {
							$event_terms_array[] = $term->name;
						}
											
						$event_terms = join( ', ', $event_terms_array );
					}
				?>

				<a class="upcoming row">
					<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
						<?php if( strpos( $event_terms, 'Oasis Men' ) !== false ) : ?>
							<div class="box">
							  <div class="box__border"></div>
								<div class="box__circle" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upcoming--men.jpg);">
									<div>
										<span>Oasis Men</span>
									</div>
								</div>
							</div>
						<?php elseif( strpos( $event_terms, 'Oasis Tutoring' ) !== false ) :  ?>
							<div class="box">
							  <div class="box__border"></div>
								<div class="box__circle" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upcoming--tutoring.jpg);">
									<div>
										<span>Oasis<br>Tutoring</span>
									</div>
								</div>
							</div>
						<?php elseif( strpos( $event_terms, 'Global Outreach' ) !== false ) :  ?>
							<div class="box">
							  <div class="box__border"></div>
								<div class="box__circle" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upcoming--outreach.jpg);">
									<div>
										<span>Global<br>Outreach</span>
									</div>
								</div>
							</div>
						<?php else: ?>
						<?php endif; ?>
					<?php endif; ?>
					<div class="upcoming__content">
						<h3 class="title"><?php the_title(); ?></h3>
						<div class="meta">
							<span><i class="fa fa-calendar"></i><?php echo date('l F jS Y', $event_date ); ?></span>
							<span><i class="fa fa-clock-o"></i><?php echo $event_time; ?></span>
						</div>
						<p class="content"><?php echo get_the_excerpt(); ?></p>
					</div>
				</a>
			<?php endwhile; ?>

			<div class="row text-center mt40">
				<a href="<?php echo esc_url( home_url( '/events' ) ); ?>" class="btn btn--dark btn--icon">
					<i class="fa fa-calendar"></i>View more Events
				</a>
			</div>

		</div>
	</section>
<?php endif; wp_reset_postdata(); ?>