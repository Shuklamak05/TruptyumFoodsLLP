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
$style		= cspt_get_base_option('service-single-style');
$single_style	= get_post_meta( get_the_ID(), 'cspt-service-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list	= 'cspt-service-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="cspt-service-single">
		<div class="cspt-service-feature-image">
			<?php cspt_get_featured_data( array( 'featured_img_only' => false, 'size' => 'cspt-img-770x400' ) ); ?>
		</div>			
		<div class="cspt-entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'',
				get_the_title()
			) );
			?>
		</div><!-- .entry-content -->
		<?php
		// Prev Next Post Link
		$cpt_name = cspt_get_base_option('service-cpt-singular-title');
		the_post_navigation( array(
			'prev_text' => cspt_esc_kses( '<span class="cspt-service-nav-icon"><i class="cspt-base-icon-left-open"></i></span> <span class="cspt-service-nav-wrapper"><span class="cspt-service-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-service-nav nav-title">%title</span> </span>' ),
			'next_text' => cspt_esc_kses( '<span class="cspt-service-nav-wrapper"><span class="cspt-service-nav-head">' . sprintf( esc_attr__('Next %1$s', 'leblix') , $cpt_name ) . '</span>' ) . cspt_esc_kses( '<span class="cspt-service-nav nav-title">%title</span> </span> <span class="cspt-service-nav-icon"><i class="cspt-base-icon-right-open"></i></span>' ),
		) );
		?>
	</div>
</article><!-- #post-## -->
<?php cspt_related_service() ?>
<?php cspt_edit_link(); ?>
