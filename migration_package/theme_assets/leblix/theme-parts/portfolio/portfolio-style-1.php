<div class="creativesplanet-post-content">
	<?php cspt_get_featured_data( array( 'featured_img_only' => true, 'size' => 'cspt-img-1030x570' ) ); ?>
	<div class="creativesplanet-icon-box creativesplanet-media-link">			  	
		<?php if( has_post_thumbnail() ): ?>
		<a class="cspt-lightbox" title="<?php the_title_attribute(); ?>" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="cspt-base-icon-plus-symbol-button"></i></a>
		<?php endif; ?>
	</div>
	<div class="creativesplanet-box-content creativesplanet-overlay">
		<div class="creativesplanet-titlebox">
			<div class="cspt-port-cat"><?php echo get_the_term_list( get_the_ID(), 'cspt-portfolio-category', '', ', ' ); ?></div>
			<h3 class="cspt-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
</div>
