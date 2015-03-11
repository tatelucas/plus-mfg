<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<div class="container hero-dashboard dashboard">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="hero-section text-center">
				
				<?php if ( ! empty( $meta->splash->title ) ) : ?>

					<h1 class="text-white"><?php echo $meta->splash->title; ?></h1>

				<?php endif; ?>

				<?php if ( ! empty( $meta->splash->subtitle ) ) : ?>

					<p class="text-white"><?php echo $meta->splash->subtitle; ?></p>

				<?php endif; ?>

			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<form class="signup-divider" role="form">

					<p class="signup-success"><i class="icon icon_check_alt2"></i><strong></strong></p>
					<p class="signup-failed"><i class="icon icon_close_alt2"></i><strong></strong></p>  

					<div class="form-group">
						<input type="text" size="25" name="signup-username" class="form-control input-lg" placeholder="<?php _e( 'Enter desired Username' ,'Pixelentity Theme/Plugin'); ?>" required>
					</div>

					<div class="form-group">
						<input type="email" name="signup-email" class="form-control input-lg" placeholder="<?php _e( 'Enter your Email-Address' ,'Pixelentity Theme/Plugin'); ?>" required>
					</div>

					<button class="btn btn-color" type="submit"><?php echo $meta->splash->signup_text; ?> <i class="icon arrow_right"></i></button>

					<?php wp_nonce_field( 'pe_signup_form', 'signup-nonce' ); ?>

				</form>
			</div>
		</div>
			
	</div>
</div>