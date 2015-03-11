<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-areachart <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="start-area-charts"></div>

	<div class="container">
		<div>
			<div class="row chart-box">
				<div class="col-md-6 col-md-push-6 col-sm-12">
					<?php if (!empty($data->content)): ?>
					<?php echo $data->content; ?>
					<?php endif; ?>
				</div>
				<div class="col-md-6 col-md-pull-6 col-sm-12">
					<!-- Line Chart -->
					<div class="line-canvas">
						<?php if (!empty($data->graphs)): ?>
						<div>
							<ul class="area-chart-data" data-labels="<?php echo esc_attr($data->labels); ?>">
								<?php foreach($data->graphs as $item): $item = (object) $item; ?>
								<li
									data-color="<?php echo esc_attr($item->color) ?>"
									data-values="<?php echo esc_attr($item->values) ?>"
									>
								</li>
								<?php endforeach; ?>
							</ul>
							<canvas class="area-chart-area" height="450" width="600"></canvas>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<!-- /End Chart-Box -->


		</div>
	</div>

</section>