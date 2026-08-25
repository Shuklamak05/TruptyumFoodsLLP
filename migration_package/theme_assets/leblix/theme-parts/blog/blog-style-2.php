<div class="post-item">
	<div class="cspt-featured-container">		
		<?php cspt_get_featured_data( array( 'size' => 'cspt-img-770x635' ) ); ?>	
		<div class="cspt-meta-date-wrapper">					
				<span><?php echo get_the_date( 'd M, Y' ); ?></span> 
		</div>		
	</div>
	<div class="creativesplanet-box-content">	
		<div class="cspt-meta-container">
				<div class="cspt-meta-author-wrapper cspt-meta-line">					
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','leblix'), get_the_author() ); ?>" rel="author"><i class="cspt-base-icon-user-2"></i> <?php printf( __( 'by %1$s', 'leblix' ), get_the_author() ); ?></a>
				</div>
					<div class="cspt-meta-comment-wrapper cspt-meta-line">					
						<div class="cspt-meta-category">
							<?php if ( !post_password_required() && comments_open() && get_comments_number()>0 ) {?> 
						<div class="cspt-meta-comment-wrapper cspt-meta-line">	
							<span class="cspt-meta cspt-meta-comments"><i class="cspt-base-icon-chat-1"></i> <?php echo esc_html( get_comments_number () ); ?> 
							<span class="cspt-meta cspt-comments-hide"><?php esc_html_e('Comments', 'leblix'); ?></span></span>
						</div>
						<?php
							}?>	
						</div>	
					</div> 
		</div>
		<h3 class="cspt-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		<div class="creativesplanet-box-desc">
			<?php
				$limit			= cspt_get_base_option('blog-element-limit');
				$limit_switch	= cspt_get_base_option('blog-element-limit-switch');
				if ( has_excerpt() ){
					the_excerpt();
				} else if( $limit>0 && $limit_switch=='1' ){
					$content = get_the_content('',FALSE,'');
					$content = wp_strip_all_tags($content);
					$content = strip_shortcodes($content);
					echo cspt_esc_kses( wp_trim_words($content, $limit) );
				} else { 
					the_content( '' );
				}
			?>		
		</div>

		<div class="cspt-service-btn"> 
				<a class="btn-arrow" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'leblix'); ?></a>
			</div>
	</div>
</div>