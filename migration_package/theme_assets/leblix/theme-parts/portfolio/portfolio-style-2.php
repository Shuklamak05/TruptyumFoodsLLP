<div class="creativesplanet-post-content">	
	<div class="cspt-image-wrapper">
		<?php cspt_get_featured_data( array( 'featured_img_only' => true, 'size' => 'cspt-img-800x670' ) ); ?>
	</div>			
	<div class="creativesplanet-box-content creativesplanet-overlay">
		<div class="creativesplanet-box-content-wrapper">
			<div class="creativesplanet-titlebox">
				<h3 class="cspt-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
				<div class="cspt-port-cat"><?php echo get_the_term_list( get_the_ID(), 'cspt-portfolio-category', '', ', ' ); ?></div>
			</div>
			<div class="creativesplanet-icon-box creativesplanet-media-link">			  	
				<?php if( has_post_thumbnail() ): ?>
				<a class="cspt-lightbox" title="<?php the_title_attribute(); ?>" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="cspt-base-icon-plus-symbol-button"></i></a>
				<?php endif; ?>
			</div> 
		</div>
	</div>
</div>