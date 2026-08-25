<?php
/**
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */
$preheader_enable = cspt_get_base_option('preheader-enable');
if( $preheader_enable==1 ) :
	?>
	<div class="cspt-pre-header-wrapper <?php cspt_preheader_class(); ?>">
		<div class="container">
			<div class="d-flex justify-content-between">
				<?php
				$preheader_left = cspt_get_base_option('preheader-left');
				if( !empty($preheader_left) ){ ?>
					<div class="cspt-pre-header-left"><?php echo cspt_esc_kses( do_shortcode($preheader_left) ); ?></div><!-- .cspt-pre-header-left -->
				<?php } ?>
				<?php
				$preheader_right = cspt_get_base_option('preheader-right');
				$preheader_search = cspt_get_base_option('preheader-search');
				if( !empty($preheader_right) || $preheader_search==true ){ ?>
					<div class="cspt-pre-header-right">

						<?php if( !empty($preheader_right) ) { echo cspt_esc_kses( do_shortcode($preheader_right) ); } ?>
						<?php if( $preheader_search==true ) { echo cspt_esc_kses( '<div class="cspt-header-search-btn"><a href="#"><i class="cspt-base-icon-search"></i></a></div>' ); } ?>

					</div><!-- .cspt-pre-header-right -->
				<?php } ?>
			</div><!-- .justify-content-between -->
		</div><!-- .container -->
	</div><!-- .cspt-pre-header-wrapper -->
<?php endif; ?>