<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
	<div class="entry-content">
		<div class="row">
			<div class="small-3 columns">
				<a href="<?php the_permalink(); ?>">
					<?php 
					echo get_field('first_name') . ' ' . get_field('last_name');
					echo get_field('suffix') ? ', ' . get_field('suffix') : '';
					?>
				</a>
			</div>
			<div class="small-3 columns">
				<?php the_field('email'); ?>&nbsp;
			</div>
			<div class="small-3 columns">
				<?php the_field('phone_number'); ?>
			</div>
			<div class="small-3 columns">
				<?php the_field('extension'); ?>
			</div>
		</div>
	</div>
</article>