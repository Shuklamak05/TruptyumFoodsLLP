<?php
/**
 * Template part for displaying posts on search results
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.2
 */
if( get_post_format()=='post' && get_post_format()=='quote' && get_post_format()=='link' ){
	// Bypassing Quote and Link post formats
} else {
	?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<div class="cspt-search-results">
		<?php if( has_post_thumbnail() ) : ?>
		<div class="cspt-search-results-inner cspt-search-results-left">
			<?php cspt_get_featured_data( array( 'featured_img_only' => true, 'size' => 'cspt-img-300x300' )  ); ?>
			<?php if( is_singular('post') ) : ?>
			<div class="cspt-blog-meta cspt-blog-meta-top">
				<?php get_template_part( 'theme-parts/post', 'top-meta' ); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="cspt-search-results-right">
			<h3 class="cspt-post-title">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
			</h3>
			<div class="cspt-entry-content">
				<?php
				$limit			= cspt_get_base_option('search-results-text-limit');
				$limit_switch	= cspt_get_base_option('blog-classic-limit-switch');
				if ( has_excerpt() ){
					the_excerpt();
				} else if( $limit>0 ){
					$content = get_the_content('',FALSE,'');
					$content = do_shortcode($content);
					$content = wp_strip_all_tags($content);
					$content = strip_shortcodes($content);
					echo cspt_esc_kses( wp_trim_words($content, $limit) );
				} else { 
					/* translators: %s: Name of current post */
					the_content( sprintf(
						'',
						get_the_title()
					) );
				}
				?>
				<div class="cspt-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More', 'leblix'); ?></span></a></div>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
<?php
}