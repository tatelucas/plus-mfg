<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<?php if ( ! empty( $meta->splash->gallery ) ) : ?>

	<?php if ( $loop = $t->gallery->getSliderLoop( $meta->splash->gallery ) ) : ?>

		<div id="slides">
			<ul class="slides-container">

				<?php while ($slide =& $loop->next()): ?>

					<li>

						<div class="overlay">

							<div class="container vmiddle">
								<div class="row">
									<div class="col-md-12">
										<div class="hero-section text-center">
											
											<?php if ( ! empty( $slide->title ) ) : ?>

												<h1 class="text-white"><?php echo $slide->title; ?></h1>

											<?php endif; ?>

											<?php if ( ! empty( $slide->subtitle ) ) : ?>

												<p class="text-white"><?php echo $slide->subtitle; ?></p>

											<?php endif; ?>

											<?php if ( ! empty( $slide->button_text_1 ) || ! empty( $slide->button_text_2 ) ) : ?>

												<div class="btn-box">

													<?php if ( ! empty( $slide->button_text_1 ) ) : ?>

														<?php

														$is_youtube = ( ( false !== strpos( $slide->button_url_1, 'youtube.com' ) ) || ( false !== strpos( $slide->button_url_1, 'youtu.be' ) ) ) ? true : false;
														$is_external = ( 'http' === substr( $slide->button_url_1, 0, 4 ) ) ? true : false;

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
															href="<?php echo esc_attr( $slide->button_url_1 ); ?>"
															target="<?php echo esc_attr( $slide->button_target_1 ); ?>"
															class="<?php echo esc_attr( $class ); ?>"
															<?php echo $attr; ?>
														>	
															<?php if ( ! empty( $slide->button_icon_1 ) ) : ?>

																<i class="<?php echo esc_attr( $slide->button_icon_1 ); ?>"></i>

															<?php endif; ?>

															<?php echo $slide->button_text_1; ?>
														</a>

													<?php endif; ?>

													<?php if ( ! empty( $slide->button_text_2 ) ) : ?>

														<?php

														$is_youtube = ( ( false !== strpos( $slide->button_url_2, 'youtube.com' ) ) || ( false !== strpos( $slide->button_url_2, 'youtu.be' ) ) ) ? true : false;
														$is_external = ( 'http' === substr( $slide->button_url_2, 0, 4 ) ) ? true : false;

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
															href="<?php echo esc_attr( $slide->button_url_2 ); ?>"
															target="<?php echo esc_attr( $slide->button_target_2 ); ?>"
															class="<?php echo esc_attr( $class ); ?>"
															<?php echo $attr; ?>
														>	
															<?php if ( ! empty( $slide->button_icon_2 ) ) : ?>

																<i class="<?php echo esc_attr( $slide->button_icon_2 ); ?>"></i>

															<?php endif; ?>

															<?php echo $slide->button_text_2; ?>
														</a>

													<?php endif; ?>

												</div>

											<?php endif; ?>

										</div>
									</div>
								</div>

							</div>

							<img src="<?php echo $slide->img; ?>" alt="slide" />

						</div>

					</li>

				<?php endwhile; ?>

			</ul>
		</div>

	<?php endif; ?>

<?php endif; ?>