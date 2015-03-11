<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-followus newsletter <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container">
		<div class="wrapper-sm">
			<div class="row">

				<?php if ( ! empty( $data->icons ) ) : ?>

					<div class="col-md-6">

						<div class="table">
							<div class="table-row">
								<div class="table-cell follow">

									<?php if ( ! empty( $data->title ) ) : ?>

										<h5 class="table-title"><?php echo $data->title; ?></h5>

									<?php endif; ?>

								</div>
								<div class="table-cell">
									<ul class="social-list">

										<?php foreach ( $data->icons as $icon ) : ?>

											<li>
												<a href="<?php echo esc_attr( $icon['url'] ); ?>" target="_blank">
													<i class="<?php echo esc_attr( $icon['icon'] ); ?>"></i>
												</a>
											</li>

										<?php endforeach; ?>

									</ul>
								</div>
							</div>
						</div>

					</div>

				<?php endif; ?>

				<?php if ( ! empty( $data->content ) ) : ?>

				<div class="col-md-6">

					<?php echo $data->content; ?>

				</div>

				<?php endif; ?>
			</div>
		</div>
	</div>

</section>