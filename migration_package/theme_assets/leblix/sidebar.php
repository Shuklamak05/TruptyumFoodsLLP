<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */
?>
<?php
$sidebar	= 'cspt-sidebar-post';
$aria_label	= esc_attr__( 'Blog Sidebar', 'leblix' );
if( is_page() ){
	// page sidebar
	$sidebar	= 'cspt-sidebar-page';
	$aria_label	= esc_attr__( 'Page Sidebar', 'leblix' );
	if( function_exists('is_woocommerce') && is_woocommerce() ){
		$sidebar	= 'cspt-sidebar-wc-shop';
		$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'leblix' );
	}
} else if( is_search() ){
	$sidebar	= 'cspt-sidebar-search';
	$aria_label	= esc_attr__( 'Search Results Sidebar', 'leblix' );
} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
	$sidebar	= 'cspt-sidebar-wc-shop';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'leblix' );
} else if( function_exists('is_product') && is_product() ){
	$sidebar	= 'cspt-sidebar-wc-single';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'leblix' );
} else if( is_singular('cspt-portfolio') ){
	$sidebar		= 'cspt-sidebar-portfolio';
	$aria_label		= esc_attr__( 'Portfolio Sidebar', 'leblix' );
} else if( is_tax('cspt-portfolio-category')  || is_post_type_archive('cspt-portfolio') ){
	$sidebar		= 'cspt-sidebar-portfolio-cat';
	$aria_label		= esc_attr__( 'Portfolio Category Sidebar', 'leblix' );
} else if( is_singular('cspt-service') ){
	$sidebar		= 'cspt-sidebar-service';
	$aria_label		= esc_attr__( 'Service Sidebar', 'leblix' );
} else if( is_tax('cspt-service-category') || is_post_type_archive('cspt-service') ){
	$sidebar		= 'cspt-sidebar-service-cat';
	$aria_label		= esc_attr__( 'Service Category Sidebar', 'leblix' );
} else if( is_singular('cspt-team-member') ){
	$sidebar		= 'cspt-sidebar-team';
	$aria_label		= esc_attr__( 'Team Member Sidebar', 'leblix' );
} else if( is_tax('cspt-team-group')  || is_post_type_archive('cspt-team-member') ){
	$sidebar		= 'cspt-sidebar-team-group';
	$aria_label		= esc_attr__( 'Team Group Sidebar', 'leblix' );
}

// check if content exists for the sidebar
$sidebar_content = '';
ob_start();
dynamic_sidebar( $sidebar );
$sidebar_content = ob_get_clean();

?>
<?php if ( is_active_sidebar( $sidebar ) && cspt_check_sidebar()==true && !empty($sidebar_content) ) : ?>
<aside id="secondary" class="widget-area creativesplanet-sidebar col-md-3 col-lg-3" aria-label="<?php echo esc_attr( $aria_label ); ?>">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
<?php endif; ?>