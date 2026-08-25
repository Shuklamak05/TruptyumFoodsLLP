<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.2
 */
ob_start();
ob_start();
cspt_blog_social_share();
$social = ob_get_contents();
ob_end_clean();
$social = trim($social);
cspt_get_featured_data();
$featured = ob_get_contents();
ob_end_clean();
$class = array();
if( empty($featured) ){
	$class[] = 'cspt-no-img';
}
if( !defined('LEBLIX_ADDON_VERSION') ){
	$class[] = 'cspt-default-view';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="cspt-blog-classic">
		<?php if( defined('LEBLIX_ADDON_VERSION') ) : ?>
		<?php endif; ?>
		<div class="cspt-featured-img-wrapper">					
			<?php cspt_get_featured_data(); ?>
			<div class="cspt-meta-date-wrapper">	

			<span class="cspt-meta-day"><?php echo get_the_date( 'd' ); ?></span>
			<span class="cspt-meta-month" ><?php echo get_the_date( 'M' ); ?></span>	
		</div>

		</div>
		<div class="cspt-blog-classic-inner">
		<?php
		if( get_post_format()!='status' && get_post_format()!='quote' && !is_single() ) : ?>

		<?php
		// Meta
		$meta_html = '';
		$meta_html .= cspt_meta_date();
		$meta_html .= cspt_meta_author();
		$meta_html .= cspt_meta_category();
		$meta_html .= cspt_meta_comment( true );
		if( !empty($meta_html) ) : ?>
		<h3 class="cspt-post-title">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</h3>
		<div class="cspt-blog-meta cspt-blog-meta-top">
			<?php echo cspt_esc_kses($meta_html); ?>
		</div>
		<?php endif; ?>

		<?php endif; ?>
		<?php
		if( is_single() ):
			// Meta
			$meta_html = '';
			$meta_html .= cspt_meta_date();
			$meta_html .= cspt_meta_author();
			$meta_html .= cspt_meta_category();
			$meta_html .= cspt_meta_comment( true );
			if( !empty($meta_html) ) : ?>
			<div class="cspt-blog-meta cspt-blog-meta-top">
				<?php echo cspt_esc_kses($meta_html); ?>
			</div>
			<?php endif; endif; ?>
			<div class="cspt-entry-content">
				<?php
				if( get_post_format()!='quote' ){
					if( is_single() ){
						/* translators: %s: Name of current post */
						the_content( sprintf('',get_the_title() ) );
					} else {
						$limit			= cspt_get_base_option('blog-classic-limit');
						$limit_switch	= cspt_get_base_option('blog-classic-limit-switch');
						if ( has_excerpt() ){
							the_excerpt();
							?>
							<div class="cspt-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Continue Reading', 'leblix'); ?></span></a></div>
							<?php
						} else if( $limit>0 && $limit_switch=='1' ){
							$content = get_the_content('',FALSE,'');
							$content = wp_strip_all_tags($content);
							$content = strip_shortcodes($content);
							echo cspt_esc_kses( wp_trim_words($content, $limit) );
							?>
							<div class="cspt-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Continue Reading', 'leblix'); ?></span></a></div>
							<?php if( !empty($social) ) : ?>
								<div class="cspt-blog-meta-social-share">
									<div class="cspt-social-icon"><i class="cspt-base-icon-share"></i>
								</div>
									<?php cspt_blog_social_share(); ?>
								</div>
							<?php endif; ?>
							<?php
						} else {
							/* translators: %s: Name of current post */
							the_content( sprintf(
								'',
								get_the_title()
							) );
							if( !is_single() ){
								global $post;
								if( strpos( $post->post_content, '<!--more-->' ) ) {
									?>
									<div class="cspt-read-more-link">
										<a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More','leblix') ?></span></a>
								</div>
									<?php
								}
							}
						}
						?>
						<?php
					}
				}
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'leblix' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		</div>
    </div>

	<?php get_template_part( 'theme-parts/post', 'bottom-meta' ); ?>

	<?php if( is_single() ) : ?>
		<?php get_template_part( 'theme-parts/post', 'author-info' ); ?>
		<?php cspt_related_post() ?>
	<?php endif; ?>
</article><!-- #post-## -->
	