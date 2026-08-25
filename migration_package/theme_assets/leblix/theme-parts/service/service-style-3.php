<?php
// Icon
$icon_html = '';
$custom_icon_enabled = get_post_meta( get_the_ID(), 'cspt-custom-icon-enabled', true ); 
if( $custom_icon_enabled=='1' ){
	$img_src = '';
	$custom_icon_url = get_post_meta( get_the_ID(), 'cspt-custom-icon', true );
	if( !empty($custom_icon_url) ){
		$img_src = wp_get_attachment_image_src($custom_icon_url, 'full');
		if( !empty($img_src[0]) ){ $custom_icon_url = $img_src[0]; }
	}
	$icon_html = '<img src="'.$custom_icon_url.'"/>';
}else{
	$icon_lib = get_post_meta( get_the_ID(), 'cspt-service-icon-library', true );
	wp_enqueue_style($icon_lib);
	$icon_class = get_post_meta( get_the_ID(), 'cspt-service-icon-'.$icon_lib, true );
	if( !empty($icon_class) ){
		$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
	}
}

// Read More text
if( !isset($more_text) ){
	$more_text = esc_attr__('More','leblix');
}
?>
	<div class="creativesplanet-post-item">

		<div class="creativesplanet-box-content">			
			<div class="creativesplanet-box-content-inner">
				<div class="cspt-service-icon-wrapper">	
					<?php echo cspt_esc_kses($icon_html); ?>
				</div>
				<div class="cspt-serv-cat"><?php echo get_the_term_list( get_the_ID(), 'cspt-service-category', '', ', ' ); ?></div>					
				<h3 class="cspt-service-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3> 
			</div>
		</div>	
		    <div class="cspt-content-box">
				<div class="cspt-content-inner">		  
					<?php cspt_get_featured_data( array( 'featured_img_only' => true, 'size' => 'cspt-img-560x350' ) ); ?>	
					<?php if( has_excerpt() ) : ?>
						<div class="cspt-service-content"><?php the_excerpt(); ?>
						<a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Get a quote', 'leblix'); ?> <i class="cspt-base-icon-right-open"></i></span></a> 
						</div>
					<?php endif; ?> 				
				</div>
		</div>		
	</div>