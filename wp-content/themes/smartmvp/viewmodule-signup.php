<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>
<?php 

$canvas_bg = ( isset( $data->canvas_bg ) ) ? $data->canvas_bg : 'yes';

if ( 'yes' === $canvas_bg ) {

	$canvas_bg_attr = 'data-canvas-highlight="' . esc_attr( $data->canvas_highlight ) . '" data-canvas-bg="' . esc_attr( $data->bgcolor ) . '"';

} else {

	$canvas_bg_attr = '';

}

?>

<?php if ( ! is_user_logged_in() || current_user_can( 'edit_pages' ) ) : ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-signup signup-divider <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?> <?php echo $canvas_bg_attr; ?>>

	<div class="container">
		<div class="wrapper-lg">

			<div class="row">
				<div class="col-md-12">

					<?php if ( ! empty( $data->title ) ) : ?>

						<h2><?php echo $data->title; ?></h2>

					<?php endif; ?>

					<?php if ( ! empty( $data->subtitle ) ) : ?>
					
						<p class="large"><?php echo $data->subtitle; ?></p>

					<?php endif; ?>

					<?php if ( ! empty( $data->handwritten ) ) : ?>

						<p class="signup-handwritten"><?php echo $data->handwritten; ?></p>

					<?php endif; ?>

				</div>
			</div>

			<div class="row">

				<form class="signup-divider" role="form">

					<p class="signup-success"><i class="icon icon_check_alt2"></i><strong></strong></p>
					<p class="signup-failed"><i class="icon icon_close_alt2"></i><strong></strong></p>  

					<div class="form-group">
						<input type="text" size="25" name="signup-username" class="form-control input-lg" placeholder="<?php _e( 'Enter desired Username' ,'Pixelentity Theme/Plugin'); ?>" required>
					</div>

					<div class="form-group">
						<input type="email" name="signup-email" class="form-control input-lg" placeholder="<?php _e( 'Enter your Email-Address' ,'Pixelentity Theme/Plugin'); ?>" required>
					</div>

					<button class="btn btn-color" type="submit"><?php echo $data->button_text; ?> <i class="icon arrow_right"></i></button>

					<?php wp_nonce_field( 'pe_signup_form', 'signup-nonce' ); ?>

				</form>

			</div>

		</div>
	</div>

</section>

<?php endif; ?>