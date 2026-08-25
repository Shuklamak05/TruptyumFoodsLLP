<div class="cspt-fld-contents align-text-center">
	<?php echo cspt_esc_kses( $icon ); ?>
	<div class="cspt-fld-wrap">
		<h4 class="cspt-fid-inner">
			<?php echo cspt_esc_kses( $before_text ); ?>
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
				>
			<?php echo esc_html( $digit ); ?>
			</span><span class="cspt-fid"><?php echo cspt_esc_kses( $after_text ); ?></span>
		</h4>
		<?php if( !empty($title) ) : ?>
		<div class="cspt-fid-title"><span><?php echo cspt_esc_kses($title); ?></span></div>
		<?php endif; ?>
	</div>
</div><!-- .cspt-fld-contents -->
