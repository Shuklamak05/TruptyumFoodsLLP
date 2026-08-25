
	<div class="creativesplanet-post-item">
		<div class="creativesplanet-team-image-box">		
			<div class="creativesplanet-box-social-links"><?php echo cspt_team_social_links(); ?></div>	
			<div class="creativesplanet-team-overlay"></div>
			<?php cspt_get_featured_data( array( 'size' => 'cspt-img-590x550' ) ); ?>
		</div>
		<div class="creativesplanet-box-content">	
			<h3 class="cspt-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>	
			<div class="creativesplanet-box-team-position-wrap">
				<?php cspt_team_designation(); ?>
			</div>	
		</div>		
	</div>

 