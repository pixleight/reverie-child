<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns front-page" id="content" role="main">
	
	<?php 
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$args = array(
			//Type & Status Parameters
			'post_type'   => 'front_page',
			'post_status' => 'publish',
			
			//Order & Orderby Parameters
			'order'               => 'ASC',
			'orderby'             => 'menu_order',
			
			//Pagination Parameters
			'posts_per_page'         => -1,
			'nopaging'               => true,
		);
	
	$wp_query = new WP_Query( $args );
	$menu_query = $wp_query;

	if( $menu_query->have_posts() ) : ?>

		<div data-magellan-expedition="fixed" data-magellan-top-offset="100">
			<dl class="sub-nav">

		<?php while ( $menu_query->have_posts() ) : $menu_query->the_post(); ?>
			<dd data-magellan-arrival="fp-post-<?php the_ID(); ?>"><a href="#fp-post-<?php the_ID(); ?>"><?php the_title(); ?></a></dd>
		<?php endwhile; ?>

			</dl>
		</div>

	<?php endif;

	if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'front-page' ); ?>
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
	<?php // get_sidebar(); ?>
		
<?php get_footer(); ?>