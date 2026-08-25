<div class="creativesplanet-post-item">
	<div class="creativesplanet-box-content">
			<div class="creativesplanet-box-img">
				<?php cspt_get_featured_data( array( 'size' => 'thumbnail' ) ); ?>
		    </div>

		<div class="creativesplanet-box-desc">			
			<blockquote class="creativesplanet-testimonial-text"><?php the_content(''); ?></blockquote>
		</div>

	</div>
	<?php cspt_testimonial_star_ratings(); ?>
	<div class="creativesplanet-box-author">		
			<div class="creativesplanet-box-title">
			<h3 class="creativesplanet-box-author"><?php echo get_the_title(); ?></h3>
			<?php cspt_testimonial_details(); ?>
		</div>
</div>
</div> 