<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">

	<?php if ( have_posts() ) : ?>
	
		<div class="row">
			<div class="columns medium-9">
				<h1>
					<?php global $wp_query;
				    $term = $wp_query->get_queried_object();
				    $title = $term->name;

				    echo $title; ?> <small>Cabins</small>
				</h1>
			</div>
			<div class="columns medium-3">
				<a href="<?php echo site_url( '/rates/' ); ?>" class="small button expand radius">Our Rates <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>

		<?php /* Start the Loop */ ?>
		<ul class="medium-block-grid-3">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'archive-cabin' ); ?>
		<?php endwhile; ?>
		</ul>
		
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
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>