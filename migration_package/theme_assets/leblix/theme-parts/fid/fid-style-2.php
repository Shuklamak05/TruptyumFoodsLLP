<div class="cspt-fld-contents align-items-center">
	<div class="cspt-circle-outer "
			data-digit			= "<?php echo esc_html($digit); ?>"
			data-fill			= "<?php echo esc_html($global_color); ?>"		
			data-emptyfill		= "#eff0f6"
			data-before			= "<?php echo esc_html($before_text); ?>"
			data-before-type	= "<?php echo esc_html($beforetextstyle); ?>"
			data-after			= "<?php echo esc_html($after_text); ?>"
			data-after-type		= "<?php echo esc_html($aftertextstyle); ?>"
			data-thickness		= "10" 
			data-width			= "90"
			>
		<div class="cspt-circle">
			<div class="cspt-fid-inner">
				<?php echo cspt_esc_kses( $icon ); ?>	
			</div>
		</div>
	</div>

	<div class="cspt-fid-sub">
		<span 
			class				  = "cspt-number-rotate"
			data-appear-animation = "animateDigits"
			data-from             = "0"
			data-to               = "<?php echo esc_html( $digit ); ?>"
			data-interval         = "<?php echo esc_html( $interval ); ?>"
			data-before           = ""
			data-before-style     = ""
			data-after            = ""
			data-after-style      = ""
		></span>		
	<?php echo cspt_esc_kses( $after_text ); ?>
		<h3 class="cspt-fid-title"><?php echo cspt_esc_kses($title); ?></h3>
	</div>
</div><!-- .cspt-fld-contents -->