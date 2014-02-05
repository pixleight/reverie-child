<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns">

		<?php // Begin Orbit Slider
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page' => -1,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1
		);
		$sticky_query = new WP_Query( $args ); 

		if( $sticky_query->have_posts() ) : ?>
		<div class="row">
			<div class="small-12 large-12 columns" role="aside">
				<ul class="example-orbit-content" data-orbit data-options="variable_height:true;resume_on_mouseout:true;">
					<?php while( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
						<?php get_template_part( 'content', 'orbit' ); ?>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; wp_reset_postdata(); // End Orbit Slider ?>
		<div class="row">
			<div class="small-12 large-12 columns" id="content" role="main">
			
			<?php $args = array(
				'post__not_in' => $sticky
			);
			query_posts( $args );
			if ( have_posts() ) : ?>
			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
				
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				
			<?php endif; // end have_posts() check ?>
			
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
				</nav>
			<?php } ?>

			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>