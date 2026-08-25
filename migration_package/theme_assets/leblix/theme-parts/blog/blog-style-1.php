<div class="post-item">
	<div class="cspt-featured-container">		
		<?php cspt_get_featured_data( array( 'size' => 'cspt-img-770x500' ) ); ?>			
	</div>
	<div class="creativesplanet-box-content">	
		<div class="cspt-meta-date-wrapper">					
			<span><?php echo get_the_date( 'd M, Y' ); ?></span> 
		</div>
	<div class="cspt-meta-container">
		<div class="cspt-meta-cat-wrapper cspt-meta-line">					
			<div class="cspt-meta-category"><?php echo get_the_category_list( ', ' ); ?></div>	
		</div> 
	</div>
		<h3 class="cspt-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		<div class="cspt-meta-container-inner">
			<div class="cspt-meta-author-wrapper cspt-meta-line">					
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','leblix'), get_the_author() ); ?>" rel="author"><i class="cspt-base-icon-user-1"></i> <?php printf( __( 'by %1$s', 'leblix' ), get_the_author() ); ?></a>
			</div>
				<div class="cspt-meta-comment-wrapper cspt-meta-line">					
						<div class="cspt-meta-category">
							 <?php if ( !post_password_required() && comments_open() && get_comments_number()>0 ) {?> 
						<div class="cspt-meta-comment-wrapper cspt-meta-line">	
							<span class="cspt-meta cspt-meta-comments"><i class="cspt-base-icon-comment-empty"></i> <?php echo esc_html( get_comments_number () ); ?> 
							<span class="cspt-meta cspt-comments-hide"><?php esc_html_e('Comments', 'leblix'); ?></span></span>
						</div>
						<?php
					}
					?>	
				</div>	
			</div> 
		</div>
	</div>
</div>

