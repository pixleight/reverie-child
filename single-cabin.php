<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<div class="row">
					<div class="columns medium-9">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
					<div class="columns medium-3">
						<a href="<?php echo site_url( '/rates/' ); ?>" class="small button expand radius">Our Rates <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
				<?php
				$types = wp_get_post_terms( get_the_id(), 'cabin_types' );

				echo '<ul class="inline-list">';

				foreach ( $types as $type ) {

				    // Sanitize the type, since we will be displaying it.
				    $type = sanitize_term( $type, 'cabin_types' );

				    $type_link = get_term_link( $type, 'cabin_types' );
				   
				    // If there was an error, continue to the next type.
				    if ( is_wp_error( $type_link ) ) {
				        continue;
				    }

				    // We successfully got a link. Print it out.
				    echo '<li><a href="' . esc_url( $type_link ) . '">' . $type->name . '</a></li>';
				}

				echo '</ul>';
				?>
			</header>
			<div class="entry-content">
				<?php if( has_post_thumbnail() ) : ?>
				<figure>
						<?php the_post_thumbnail( 'large', array( 'class' => 'radius') ); ?>
				</figure>
				<?php endif; ?>
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Post'); ?>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>