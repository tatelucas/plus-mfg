<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-piechart <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="start-pie-charts"></div>

	<div class="container">
		<div class="wrapper-lg">
			<div class="row">
				<div class="col-md-12">
					<?php if (!empty($data->title)): ?>
					<h2><?php echo $data->title; ?></h2>
					<?php endif; ?>
					<?php if (!empty($data->subtitle)): ?>
					<?php echo strtr($data->subtitle,array('<p>'=>'<p class="large">')); ?>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="row doughnut-box">
				<div class="col-md-5">
					<!-- Chart Text Description -->
					<?php if (!empty($data->content)): ?>
					<?php echo $data->content; ?>
					<?php endif; ?>
				</div>
				<div class="col-md-7">
					<!-- Doughnut Charts  -->
					<?php if (!empty($data->graph1_values)): ?>
					<div class="canvas-holder">
						<div class="chart-text">
							<?php if (!empty($data->graph1_label)): ?>
							<?php echo $data->graph1_label; ?>
							<?php endif; ?>
						</div>
						<ul class="pie-chart-data">
							<?php foreach($data->graph1_values as $item): $item = (object) $item; ?>
							<li
								data-label="<?php echo esc_attr($item->label) ?>"
								data-value="<?php echo esc_attr($item->value) ?>"
								data-color="<?php echo esc_attr($item->color) ?>"
								data-highlight="<?php echo esc_attr($item->hilight) ?>"
								>
							</li>
							<?php endforeach; ?>
						</ul>
						<canvas class="pie-chart-area" width="400" height="400"></canvas>
					</div>
					<?php endif; ?>
					<?php if (!empty($data->graph2_values)): ?>
					<div class="canvas2-holder">
						<div class="chart2-text">
							<?php if (!empty($data->graph2_label)): ?>
							<?php echo $data->graph2_label; ?>
							<?php endif; ?>
						</div>
						<ul class="pie-chart-data">
							<?php foreach($data->graph2_values as $item): $item = (object) $item; ?>
							<li
								data-label="<?php echo esc_attr($item->label) ?>"
								data-value="<?php echo esc_attr($item->value) ?>"
								data-color="<?php echo esc_attr($item->color) ?>"
								data-highlight="<?php echo esc_attr($item->hilight) ?>"
								>
							</li>
							<?php endforeach; ?>
						</ul>
						<canvas class="pie-chart-area" width="300" height="300"></canvas>
					</div>
					<?php endif; ?>
				</div>
			</div><!-- /End Chart-Box -->
		</div>
	</div>

</section>
