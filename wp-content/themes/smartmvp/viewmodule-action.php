<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-action img-with-action light-bg <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container wrapper-lg">
		<div class="row">
			<div class="col-lg-5 col-md-5">
				<?php if (!empty($data->title)): ?>
				<h3><?php echo $data->title; ?></h3>
				<?php endif; ?>
				<?php if (!empty($data->content)): ?>
				<?php echo $data->content; ?>
				<?php endif; ?>
				<!-- Call To Action Buttons -->
				<div class="btn-box">
					<?php if ( ! empty( $data->button_text_1 ) ) : ?>

						<?php

						$is_youtube = ( ( false !== strpos( $data->button_url_1, 'youtube.com' ) ) || ( false !== strpos( $data->button_url_1, 'youtu.be' ) ) ) ? true : false;
						$is_external = ( 'http' === substr( $data->button_url_1, 0, 4 ) ) ? true : false;

						$class = '';
						$class .= ( ! $is_external ) ? 'scrollto ' : '';
						$class .= ( 'filled' === $data->button_color_1 ) ? 'btn btn-color ' : 'btn btn-grey ';
						$class .= ( $is_youtube ) ? 'venobox ' : '';

						$attr = ( $is_youtube ) ? 'data-type="youtube" ' : '';

						?>

						<a
							href="<?php echo esc_attr( $data->button_url_1 ); ?>"
							target="<?php echo esc_attr( $data->button_target_1 ); ?>"
							class="<?php echo esc_attr( $class ); ?>"
							<?php echo $attr; ?>
						>	
							<?php if ( ! empty( $data->button_icon_1 ) ) : ?>

								<i class="<?php echo esc_attr( $data->button_icon_1 ); ?>"></i>

							<?php endif; ?>

							<?php echo $data->button_text_1; ?>
						</a>

					<?php endif; ?>

					<?php if ( ! empty( $data->button_text_2 ) ) : ?>

						<?php

						$is_youtube = ( ( false !== strpos( $data->button_url_2, 'youtube.com' ) ) || ( false !== strpos( $data->button_url_2, 'youtu.be' ) ) ) ? true : false;
						$is_external = ( 'http' === substr( $data->button_url_2, 0, 4 ) ) ? true : false;

						$class = '';
						$class .= ( ! $is_external ) ? 'scrollto ' : '';
						$class .= ( 'filled' === $data->button_color_2 ) ? 'btn btn-color ' : 'btn btn-grey ';
						$class .= ( $is_youtube ) ? 'venobox ' : '';

						$attr = ( $is_youtube ) ? 'data-type="youtube" ' : '';

						?>

						<a
							href="<?php echo esc_attr( $data->button_url_2 ); ?>"
							target="<?php echo esc_attr( $data->button_target_2 ); ?>"
							class="<?php echo esc_attr( $class ); ?>"
							<?php echo $attr; ?>
						>	
							<?php if ( ! empty( $data->button_icon_2 ) ) : ?>

								<i class="<?php echo esc_attr( $data->button_icon_2 ); ?>"></i>

							<?php endif; ?>

							<?php echo $data->button_text_2; ?>
						</a>

					<?php endif; ?>

				</div>
				<!-- Div Required for Correct Charts Animation -->
				<div class="start-charts"></div>
			</div>
		</div><!-- /End Row-->
	</div><!-- /End Container-->
	
	<?php if (!empty($data->image)): ?>
	<div class="hidden-sm hidden-xs col-md-6 img-col-bg img-right" style="background-image: url('<?php echo esc_url($data->image) ?>')"></div>
	<?php endif; ?>

</section>