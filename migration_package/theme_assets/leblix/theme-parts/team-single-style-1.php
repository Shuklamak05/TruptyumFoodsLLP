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
$progressbar_title = '';
$style		= cspt_get_base_option('team-single-style');
$class_list	= 'container cspt-team-single-style-'.$style;
// Team Member details
$designation	= get_post_meta( get_the_ID(), 'cspt-team-details_designation', true ); 
if( !empty($designation) ){ $designation = '<h4 class="cspt-team-designation">' . esc_attr($designation) . '</h4>'; }
$email			= get_post_meta( get_the_ID(), 'cspt-team-details_email', true ); 
if( !empty($email) ){ $email = '<li><label>'.esc_html__('Email', 'leblix').'</label> <a href="mailto:' . sanitize_email($email) . '">' . esc_attr($email) . '</a></li>'; }
$phone			= get_post_meta( get_the_ID(), 'cspt-team-details_phone', true ); 
if( !empty($phone) ){ $phone = '<li><label>'.esc_html__('Phone', 'leblix').'</label> ' . esc_attr($phone) . '</li>'; }
$sitetitle		= get_post_meta( get_the_ID(), 'cspt-team-details_sitetitle', true );
$siteurl		= get_post_meta( get_the_ID(), 'cspt-team-details_siteurl', true ); 
$site			= '';
if( !empty($siteurl) ){
	$sitetitle		= ( empty($sitetitle) ) ? $siteurl : $sitetitle ;
	$site = '<li><label>'.esc_html__('Website', 'leblix').'</label> <a href="' . esc_url($siteurl) . '">' . esc_attr($sitetitle) . '</a> </li>';
}
$fax			= get_post_meta( get_the_ID(), 'cspt-team-details_fax', true ); 
if( !empty($fax) ){ $fax = '<li><label>'.esc_html__('Fax', 'leblix').'</label> ' . esc_attr($fax) . '</li>'; }

	// Progressbar
	$progress_1_number		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_1_number', true );
	$progress_1_label		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_1_label', true );
	$progress_2_number		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_2_number', true );
	$progress_2_label		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_2_label', true );
	$progress_3_number		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_3_number', true );
	$progress_3_label		= get_post_meta( get_the_ID(), 'cspt-team-details_progress_3_label', true );
	$progressbar_html		= '';
	if( !empty($progress_1_label) ){
		$progressbar_html .= '<div class="cspt-progressbar">
			<span class="elementor-title">'.esc_attr($progress_1_label).'</span>
			<div class="elementor-progress-wrapper">
				<div class="elementor-progress-bar" data-max="'.esc_attr($progress_1_number).'">
					<span class="elementor-progress-text">'.esc_attr($progress_1_label).'</span>
					<span class="elementor-progress-percentage">'.esc_attr($progress_1_number).'%</span>
				</div>
			</div>
		</div>';
	}
	if( !empty($progress_2_label) ){
		$progressbar_html .= '<div class="cspt-progressbar">
			<span class="elementor-title">'.esc_attr($progress_2_label).'</span>
			<div class="elementor-progress-wrapper">
				<div class="elementor-progress-bar" data-max="'.esc_attr($progress_2_number).'">
					<span class="elementor-progress-text">'.esc_attr($progress_2_label).'</span>
					<span class="elementor-progress-percentage">'.esc_attr($progress_2_number).'%</span>
				</div>
			</div>
		</div>';
	}
	if( !empty($progress_3_label) ){
		$progressbar_html .= '<div class="cspt-progressbar">
			<span class="elementor-title">'.esc_attr($progress_3_label).'</span>
			<div class="elementor-progress-wrapper">
				<div class="elementor-progress-bar" data-max="'.esc_attr($progress_3_number).'">
					<span class="elementor-progress-text">'.esc_attr($progress_3_label).'</span>
					<span class="elementor-progress-percentage">'.esc_attr($progress_3_number).'%</span>
				</div>
			</div>
		</div>';
	}
	if( !empty($progressbar_html) ){
		$progressbar_html = '<div class="cspt-team-progressbar">'.$progressbar_html.'</div>';
	}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="cspt-team-single">
		<div class="cspt-team-single-inner">
			<div class="row">
				<div class="col-md-4 col-lg-4">
					<div class="cspt-team-left-inner">
						<?php cspt_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full' ) ); ?>
						<div class="cspt-team-info-block">
						<h2 class="cspt-team-title"><?php the_title(); ?></h2>
							<?php echo cspt_esc_kses($designation); ?>

							<?php
								// Short Description
								$short_desc = get_post_meta( get_the_ID(), 'cspt-team-details_short-description', true );
								if( !empty($short_desc) ){
									?>
									<div class="cspt-short-description"> 
										<?php echo do_shortcode($short_desc); ?>
									</div>
									<?php
								}
							?>
						</div>
						<div class="cspt-team-info-block">
							<h3><?php esc_html_e('Personal Information', 'leblix'); ?></h3>
							<ul class="cspt-single-team-info">
								<?php echo cspt_esc_kses($phone); ?>
								<?php echo cspt_esc_kses($email); ?>
								<?php echo cspt_esc_kses($site); ?>
								<?php echo cspt_esc_kses($fax); ?>
							</ul>
						</div>
						<div class="cspt-team-info-block">	
							<h3><?php esc_html_e('Skill', 'leblix'); ?></h3>
						    <?php echo cspt_esc_kses($progressbar_html); ?>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-lg-8">
					<div class="cspt-entry-content">
						<?php
						the_content( sprintf(
							'',
							get_the_title()
						) );
						?>
					</div>
				</div>
			</div><!-- .row -->
		</div>
	</div><!-- .cspt-team-single -->
</article><!-- #post-## -->
<?php cspt_edit_link( get_the_ID() ); ?>