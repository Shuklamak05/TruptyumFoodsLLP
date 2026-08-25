<?php
/**
 * Template part for displaying WooCommerce Single product view
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.2
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cspt-wc-single-classic">
		<?php cspt_get_featured_data(); ?>
		<div class="cspt-wc-single-classic-inner">			
			<div class="cspt-entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					'',
					get_the_title()
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->