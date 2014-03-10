<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class('index-card large-4 columns'); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">
		<figure><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium'); } ?></a></figure> 
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
		<?php the_excerpt(); ?>
	</div>
</li>