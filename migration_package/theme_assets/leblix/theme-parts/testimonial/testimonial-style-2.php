<div class="creativesplanet-post-item">
	<div class="creativesplanet-box-content d-flex">
			<div class="creativesplanet-box-img">
				<?php cspt_get_featured_data( array( 'size' => 'thumbnail' ) ); ?>
		    </div>
			<div class="creativesplanet-author-wrapper">
				<div class="creativesplanet-box-author">
					<h3 class="creativesplanet-box-title"><?php echo get_the_title(); ?></h3>
					<?php cspt_testimonial_details(); ?>
				</div>
				<?php cspt_testimonial_star_ratings(); ?>
			</div>	
	</div>
	<div class="creativesplanet-box-desc">
		<blockquote class="creativesplanet-testimonial-text"><?php the_content(''); ?></blockquote>							
	</div>	
</div>