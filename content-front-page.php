<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?> style="background-image: url(<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); echo $url[0]; ?>);">
	<a name="fp-post-<?php the_ID(); ?>" data-magellan-destination="fp-post-<?php the_ID(); ?>"></a>
	<div class="article-padding">
		<div class="article-content">
			<header>
				<h2><?php the_title(); ?></h2>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article>