<?php
/**
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */
$titlebar_enable = cspt_get_base_option('titlebar-enable');
if( is_page() || is_singular() || is_home() ){

	$page_id = get_the_ID();
	if( is_home() ){
		$page_id = get_option( 'page_for_posts');
	}
	$post_meta = get_post_meta( $page_id, 'cspt-titlebar-hide', true );
	if( $post_meta=='1' ){
		$titlebar_enable = 0;
	}
}
if( $titlebar_enable==1 ) :
	?>
	<div class="cspt-title-bar-wrapper <?php cspt_titlebar_class(); ?>">
		<div class="container">
			<div class="cspt-title-bar-content">
				<div class="cspt-title-bar-content-inner">
					<?php echo cspt_titlebar_headings(); ?>
					<?php echo cspt_titlebar_breadcrumb(); ?>
				</div>
			</div><!-- .cspt-title-bar-content -->
		</div><!-- .container -->
	</div><!-- .cspt-title-bar-wrapper -->
<?php endif; ?>