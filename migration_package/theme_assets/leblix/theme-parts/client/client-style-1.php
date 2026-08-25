<?php $hover_img = cspt_client_hover_img(); ?>
<div class="cspt-client-wrapper<?php if(!empty($hover_img)){ ?> cspt-client-with-hover-img<?php } ?>">
	<h4 class="cspt-hide"><?php echo get_the_title(); ?></h4>
	<?php cspt_client_logo_link('start'); ?>
	<?php echo cspt_esc_kses(cspt_client_hover_img()); ?>
	<?php cspt_get_featured_data( array( 'size' => 'cspt-img-770x9999' ) ); ?>
	<?php cspt_client_logo_link('end'); ?>
</div>