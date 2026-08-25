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
// Class list
$style			= cspt_get_base_option('portfolio-single-style');
$single_style	= get_post_meta( get_the_ID(), 'cspt-portfolio-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list		= 'cspt-portfolio-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="cspt-portfolio-single">

		<div class="cspt-single-project-content-wrapper">
			<?php cspt_get_featured_data( array( 'featured_img_only' => false, 'size' => 'cspt-img-1200x600' ) ); ?>
			<div  class="cspt-single-project-details-list">
				<?php cspt_portfolio_details_list(); ?>	
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">				
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
		<?php
		// Prev Next Post Link
		$cpt_name = cspt_get_base_option('portfolio-cpt-singular-title');
		$next_post = get_next_post();
		$previous_post = get_previous_post();
		$prevThumbnail = isset( $previous_post->ID ) ? get_the_post_thumbnail($previous_post->ID,'thumbnail') : '';
		$nextThumbnail = isset( $next_post->ID ) ? get_the_post_thumbnail($next_post->ID,'thumbnail') : '';
		the_post_navigation( array(
			'prev_text' => cspt_esc_kses( '<span class="cspt-portfolio-nav-thumbnail">' . $prevThumbnail .'</span> <span class="cspt-portfolio-nav-wrapper"><span class="cspt-portfolio-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-portfolio-nav nav-title">%title</span> </span>' ),
			'next_text' => cspt_esc_kses( '<span class="cspt-portfolio-nav-wrapper"><span class="cspt-portfolio-nav-head">' . sprintf( esc_attr__('Next %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-portfolio-nav nav-title">%title</span> </span> <span class="cspt-portfolio-nav-thumbnail">' . $nextThumbnail .'</span>' ),
		) );
		?>
	</div>
</article><!-- #post-## -->
<?php cspt_related_portfolio(); ?>
<?php cspt_edit_link(); ?>