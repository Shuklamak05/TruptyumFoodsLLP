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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<div class="cspt-portfolio-single">
		<?php cspt_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full' ) ); ?>
		<?php cspt_portfolio_details_list(); ?>
		<div class="cspt-entry-content">
			<?php
			if( get_post_format()!='quote' && get_post_format()!='link' ){
				if( is_single() ){
					/* translators: %s: Name of current post */
					the_content( sprintf(
						'',
						get_the_title()
					) );
				} else {
					$limit = cspt_get_base_option('portfolio-classic-limit');
					if ( has_excerpt() ){
						the_excerpt();
					} else if( $limit>0 ){
						$content = get_the_content('',FALSE,'');
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
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
		// Prev Next Post Link
		if( is_single() ){
			$cpt_name = cspt_get_base_option('portfolio-cpt-singular-title');
			the_post_navigation( array(
				'prev_text' => cspt_esc_kses( '<span class="cspt-portfolio-nav-icon"><i class="cspt-base-icon-left-open"></i></span> <span class="cspt-portfolio-nav-wrapper"><span class="cspt-portfolio-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-portfolio-nav nav-title">%title</span> </span>' ),
				'next_text' => cspt_esc_kses( '<span class="cspt-portfolio-nav-wrapper"><span class="cspt-portfolio-nav-head">' . sprintf( esc_attr__('Next %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-portfolio-nav nav-title">%title</span> </span> <span class="cspt-portfolio-nav-icon"><i class="cspt-base-icon-right-open"></i></span>' ),
			) );
		}
		?>
	</div>
</article><!-- #post-## -->