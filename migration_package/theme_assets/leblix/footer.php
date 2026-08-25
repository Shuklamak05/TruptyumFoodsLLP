<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.2
 */
$footer_show_social		= cspt_get_base_option('footer-show-social');
$footer_widget_columns	= cspt_footer_widget_columns(); // array
$widget_exists			= $footer_widget_columns[0];
$footer_columns			= $footer_widget_columns[1];
$footer_column			= $footer_widget_columns[2];
$footer_boxes_area = cspt_get_base_option('footer-boxes-area');

?>
				<?php if( cspt_check_sidebar() == true ){ ?>
					</div><!-- .row -->
				<?php } ?>
				</div><!-- #content -->
			</div><!-- .site-content-wrap -->
			
	<?php if ( function_exists( 'hfe_footer_enabled' ) && true == hfe_footer_enabled() ): ?>
		<?php echo hfe_render_footer(); ?>
	<?php else: ?>
		<footer id="colophon" class="cspt-footer-section site-footer <?php cspt_footer_classes(); ?>">
			<?php if( $footer_boxes_area == true ) { ?>				
				<div class="cspt-footer-section cspt-footer-big-area-wrapper cspt-bg-color-transparent">
					<div class="footer-wrap cspt-footer-big-area">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-sm-12">
									<div class="d-md-flex align-items-center">
										<?php $footer_logo = cspt_get_base_option('footer-logo'); 
										if( !empty($footer_logo) ){ ?>
											<div class="cspt-footer-logo">
												<img class="cspt-main-logo" src="<?php echo esc_url($footer_logo);?>" alt="<?php echo get_bloginfo( 'name' );?>" title="<?php echo get_bloginfo( 'name' );?>" />
											</div>
										<?php } ?>
									</div>
								</div>
									<div class="col-md-4 col-sm-12"> 
										<?php cspt_footer_boxes_area(); ?>
									</div>						

								<div class="col-md-4 col-sm-12 cspt-footer-social-icon">
									<?php $footer_left_area = cspt_get_base_option('footer-left-area');
									if( !empty($footer_left_area) ){
										echo cspt_esc_kses( do_shortcode( $footer_left_area ) ); 
									} ?>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			<?php if( $widget_exists==true ) : ?>
			<div class="cspt-footer-section footer-wrap cspt-footer-widget-area <?php cspt_footer_widget_classes(); ?>">
				<div class="container">
					<div class="row">
						<?php 
						$col = 1;
						foreach( $footer_columns as $column ){
							$class = ( $footer_column == '3-3-3-3' ) ? 'col-md-6 col-lg-3' : 'col-md-'.$column ;
							if ( is_active_sidebar( 'cspt-footer-'.$col ) ) { ?>
								<div class="cspt-footer-widget cspt-footer-widget-col-<?php echo esc_attr($col); ?> <?php echo esc_attr($class); ?>">
									<?php dynamic_sidebar( 'cspt-footer-'.$col ); ?>
								</div><!-- .cspt-footer-widget -->
							<?php };
							$col++;
						} // end foreach
						?>
					</div><!-- .row -->
				</div>	
			</div>
			<?php endif; ?>
			<?php
			$copyright_text			= cspt_get_base_option('copyright-text');
			$footer_right_content	= cspt_get_base_option('footer-copyright-right-content');
			?>
			<div class="cspt-footer-section cspt-footer-text-area <?php cspt_footer_copyright_classes(); ?>">
				<div class="container">
					<div class="cspt-footer-text-inner">
						<div class="row">
							<?php if( empty($footer_right_content) || ( $footer_right_content=='footer-menu' && !has_nav_menu('creativesplanet-footer') ) ) : ?>
								<div class="cspt-footer-copyright-box cspt-footer-copyright-text col-md-12 text-center">
							<?php else : ?>
								<div class="cspt-footer-copyright col-md-6 text-left">
							<?php endif; ?>
								<div class="cspt-footer-copyright-text-area">
									<?php echo cspt_esc_kses( do_shortcode($copyright_text) ); ?>
								</div>
							</div><!-- .cspt-footer-copyright -->
							<?php if ( !empty($footer_right_content) ) : ?>
								
									<?php if ( $footer_right_content=='footer-menu' && has_nav_menu('creativesplanet-footer') ) : ?>
									<div class="col-md-6 text-right">
										<div class="cspt-footer-menu-area">
											<?php wp_nav_menu( array(
												'theme_location' => 'creativesplanet-footer',
												'menu_id'        => 'cspt-footer-menu',
												'menu_class'     => 'cspt-footer-menu',
											) ); ?>
										</div>
									</div><!-- .col-md-6 -->
									<?php elseif( $footer_right_content=='social-links' ) : ?>
										<div class="col-md-6 text-right">
											<div class="cspt-footer-social-links-area">
												<?php echo do_shortcode('[cspt-social-links]'); ?>
											</div>
										</div><!-- .col-md-6 -->
									<?php endif; ?>
								
							<?php endif; ?>
						</div>
					</div>	
				</div>
			</div>

		</footer><!-- #colophon -->
	<?php endif; ?>
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<a href="#" class="scroll-to-top"><i class="cspt-base-icon-up-open-big"></i></a>
<?php wp_footer(); ?>
</body>
</html>
