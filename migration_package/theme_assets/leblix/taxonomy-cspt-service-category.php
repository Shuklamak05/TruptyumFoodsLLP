<?php
/**
 * The template for displaying category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */

$desc			= term_description();
$category		= get_queried_object();
$cat_id			= $category->term_id;
$term			= get_term( $cat_id );
$sub_category	= get_terms( $term->taxonomy, array('parent' => $cat_id, 'hide_empty' => false) );

$sub_category_exists = false;
if( (is_array($sub_category) && count($sub_category)>0) ){
	$sub_category_exists = true;
}

get_header(); ?>
<div id="primary" class="content-area <?php if( cspt_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main">

		<?php
		if( $sub_category_exists==true || !empty($desc) ){
		?>
		<div class="row multi-columns-row">
		<?php } ?>

		<?php
		// Term Description
		if( !empty($desc) ){
			?>
			<div class="cspt-term-desc <?php if($sub_category_exists==true) { ?>col-md-8<?php } else { ?>col-md-12<?php } ?>">
				<?php echo do_shortcode( $desc ); ?>
			</div>
			<?php
		}
		?>
		<?php
		// Sub category
		if( $sub_category_exists==true ){
			?>
			<div class="cspt-sub-cat-list <?php if(!empty($desc)) { ?>col-md-4<?php } else { ?>col-md-12<?php } ?>">
				<?php cspt_sub_category_list(); ?>
			</div>
			<?php
		}
		?>

		<?php
		if( (is_array($sub_category) && count($sub_category)>0) || !empty($desc) ){
		?>
		</div><!-- .row.multi-column-row -->
		<?php } ?>

		<?php
		$settings = array();
		$settings['style']	= cspt_get_base_option('service-cat-style');
		$settings['style']	= str_replace('style-','', $settings['style'] );
		$settings['column']	= cspt_get_base_option('service-cat-column');
		$settings['show']	= cspt_get_base_option('service-cat-count');
		// Starting container
		echo cspt_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'service',
			'data'		=> $settings
		) );
		?>
		<?php
		if ( have_posts() ) :
			$style		= cspt_get_base_option('service-cat-style');
			$column		= cspt_get_base_option('service-cat-column');
			$style		= str_replace('style-','', $style );
			?>
			<div class="cspt-element-cat-wrapper row multi-columns-row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				// Icon
				$icon_html = '';
				$icon_lib = get_post_meta( get_the_ID(), 'cspt-service-icon-library', true );
				$icon_class = get_post_meta( get_the_ID(), 'cspt-service-icon-'.$icon_lib, true );
				if( !empty($icon_class) ){
					$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
				}
				$more_text	= esc_attr__('More Details','leblix'); // Show
				if( file_exists( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' ) ){
					echo cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'style'		=> $style,
						'cpt'		=> 'service',
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' );
					echo cspt_element_block_container( array(
						'position'	=> 'end',
					) );
				} else {
					echo '<!-- Template file not found -->';
				}
				?>
				<?php
			endwhile;
			?>
			<?php
			// Ending wrapper of the whole arear
			echo cspt_element_container( array(
				'position'	=> 'end',
				'cpt'		=> 'service',
				'data'		=> $settings
			) );
			?>
			<?php
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</div><!-- .cspt-element-cat-wrapper row multi-columns-row -->
			<?php
			// Pagination
			cspt_pagination();
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();
