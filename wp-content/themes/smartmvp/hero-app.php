<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<div class="container vmiddle hero-app">
	<div class="row">
		<div class="col-sm-6">
			<div class="hero-section">
				
				<?php if ( ! empty( $meta->splash->title ) ) : ?>

					<h1 class="text-white"><?php echo $meta->splash->title; ?></h1>

				<?php endif; ?>

				<?php if ( ! empty( $meta->splash->subtitle ) ) : ?>

					<p class="text-white"><?php echo $meta->splash->subtitle; ?></p>

				<?php endif; ?>

				<?php if ( ! empty( $meta->splash->button_text_1 ) || ! empty( $meta->splash->button_text_2 ) ) : ?>

					<div class="btn-box">

						<?php if ( ! empty( $meta->splash->button_text_1 ) ) : ?>

							<?php

							$is_youtube = ( ( false !== strpos( $meta->splash->button_url_1, 'youtube.com' ) ) || ( false !== strpos( $meta->splash->button_url_1, 'youtu.be' ) ) ) ? true : false;
							$is_external = ( 'http' === substr( $meta->splash->button_url_1, 0, 4 ) ) ? true : false;

							$button_color = $meta->splash->button_color_1;

							if ( 'filled' === $button_color ) {

								$button_color = 'btn btn-color ';

							} else if ( 'transparent' === $button_color ) {

								$button_color = 'btn btn-ghost ';

							} else {

								$button_color = 'btn btn-white ';

							}

							$class = '';
							$class .= ( ! $is_external ) ? 'scrollto ' : '';
							$class .= $button_color;
							$class .= ( $is_youtube ) ? 'venobox ' : '';

							$attr = ( $is_youtube ) ? 'data-type="youtube" ' : '';

							?>

							<a
								href="<?php echo esc_attr( $meta->splash->button_url_1 ); ?>"
								target="<?php echo esc_attr( $meta->splash->button_target_1 ); ?>"
								class="<?php echo esc_attr( $class ); ?>"
								<?php echo $attr; ?>
							>	
								<?php if ( ! empty( $meta->splash->button_icon_1 ) ) : ?>

									<i class="<?php echo esc_attr( $meta->splash->button_icon_1 ); ?>"></i>

								<?php endif; ?>

								<?php echo $meta->splash->button_text_1; ?>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $meta->splash->button_text_2 ) ) : ?>

							<?php

							$is_youtube = ( ( false !== strpos( $meta->splash->button_url_2, 'youtube.com' ) ) || ( false !== strpos( $meta->splash->button_url_2, 'youtu.be' ) ) ) ? true : false;
							$is_external = ( 'http' === substr( $meta->splash->button_url_2, 0, 4 ) ) ? true : false;

							$button_color = $meta->splash->button_color_2;

							if ( 'filled' === $button_color ) {

								$button_color = 'btn btn-color ';

							} else if ( 'transparent' === $button_color ) {

								$button_color = 'btn btn-ghost ';

							} else {

								$button_color = 'btn btn-white ';

							}

							$class = '';
							$class .= ( ! $is_external ) ? 'scrollto ' : '';
							$class .= $button_color;
							$class .= ( $is_youtube ) ? 'venobox ' : '';

							$attr = ( $is_youtube ) ? 'data-type="youtube" ' : '';

							?>

							<a
								href="<?php echo esc_attr( $meta->splash->button_url_2 ); ?>"
								target="<?php echo esc_attr( $meta->splash->button_target_2 ); ?>"
								class="<?php echo esc_attr( $class ); ?>"
								<?php echo $attr; ?>
							>	
								<?php if ( ! empty( $meta->splash->button_icon_2 ) ) : ?>

									<i class="<?php echo esc_attr( $meta->splash->button_icon_2 ); ?>"></i>

								<?php endif; ?>

								<?php echo $meta->splash->button_text_2; ?>
							</a>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>

		</div>

		<?php if ( ! empty( $meta->splash->image ) ) : ?>

			<div class="col-sm-6 hidden-xs">
				<div class="app-box">
					<img src="<?php echo esc_attr( $meta->splash->image ); ?>" alt="hero" class="img-responsive">
				</div>
			</div>

		<?php endif; ?>
			
	</div>
</div>