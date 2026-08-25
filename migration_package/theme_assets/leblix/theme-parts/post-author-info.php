<?php
$bio = get_the_author_meta( 'description' );
if( !empty($bio) ) :
?>
	<div class="cspt-author-box">
		<?php if(get_avatar(get_the_author_meta('ID')) !== FALSE) { ?>
			<div class="cspt-author-image">
				<?php echo cspt_esc_kses( get_avatar(get_the_author_meta('ID')) ); ?>
			</div>
		<?php } ?>
		<div class="cspt-author-content">
			<span class="cspt-author-name">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','leblix'), get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
			</span>
			<p class="cspt-text cspt-author-bio"><?php the_author_meta( 'description' ); ?></p>
			<?php cspt_author_social_links(); ?>
		</div>
	</div>
<?php endif; ?>