<?php
/**
 * Template part for displaying post meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 * @version 1.0
 */
$meta_array = array();
ob_start();
cspt_blog_social_share();
$social = ob_get_contents();
ob_end_clean();
$social = trim($social);
?>
<?php if ( is_single() && ( !empty($social) || has_tag() ) ) { ?>
	<div class="cspt-blog-meta cspt-blog-meta-bottom <?php if( empty($social) ) : ?> cspt-blog-meta-no-social<?php endif; ?>">
		<?php if( has_tag() ) : ?>
		<div class="cspt-blog-meta-bottom-left">
			<div class="cspt-tag-icon"></div>
			<?php echo cspt_esc_kses( cspt_meta_tag('') ); // Tag Meta ?>
		</div>
		<?php endif; ?>
		<?php if( !empty($social) ) : ?>
		<div class="cspt-blog-meta-bottom-right">
			<?php cspt_blog_social_share(); ?>
		</div>
		<?php endif; ?>
	</div>
<?php } ?>