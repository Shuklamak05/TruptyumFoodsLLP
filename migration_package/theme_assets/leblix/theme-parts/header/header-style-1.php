<?php
/**
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_template_part( 'theme-parts/header/pre-header',	cspt_get_base_option('header-style') ); ?>
<div class="cspt-header-height-wrapper">
	<div class="cspt-main-header-area <?php cspt_header_class(); ?> <?php cspt_header_bg_class(); ?>">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<div class="cspt-logo-menuarea">
					<div class="site-branding cspt-logo-area">
						<div class="wrap">
							<?php echo cspt_logo(); ?><!-- Logo area -->
						</div><!-- .wrap -->
					</div><!-- .site-branding -->
					<!-- Top Navigation Menu -->
					<div class="navigation-top">
						<div class="cspt-mobile-menu-bg"></div>
						<button id="menu-toggle" class="nav-menu-toggle">
							<i class="cspt-base-icon-menu-1"></i>
						</button>
							<div class="wrap">
								<nav id="site-navigation" class="main-navigation cspt-navbar <?php cspt_nav_class(); ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'leblix' ); ?>">
									<?php wp_nav_menu( array(
										'theme_location' => 'creativesplanet-top',
										'menu_id'        => 'cspt-top-menu',
										'menu_class'     => 'menu',
									) ); ?>
								</nav><!-- #site-navigation -->
							</div><!-- .wrap -->
					</div><!-- .navigation-top -->
				</div>
				<div class="cspt-right-box">
					<?php cspt_cart_icon(); ?>
					<?php cspt_header_search(); ?>					
				</div>
			</div><!-- .justify-content-between -->
		</div><!-- .container -->
	</div><!-- .cspt-header-wrapper -->
</div><!-- .cspt-header-height-wrapper -->
