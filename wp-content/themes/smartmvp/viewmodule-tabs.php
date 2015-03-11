<?php $t =& peTheme(); ?>
<?php list($view,$data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-tabs tab-features color-bg <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container">
		<div class="features-title">
			<div class="row">
				<div class="col-md-12">
					<?php if (!empty($data->title)): ?>
					<h2 class="text-white"><?php echo $data->title; ?></h2>
					<?php endif; ?>
					<?php if (!empty($data->subtitle)): ?>
					<?php echo strtr($data->subtitle,array('<p>'=>'<p class="large text-white">')); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if (!empty($items)): ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="tabs features tab-container">
				<ul class="etabs">
					<?php $count = 1; ?>
					<?php foreach($items as $item): ?>
					<?php $id = sprintf('#tab-section%s-%s',$bid,$count++); ?>
					<li class="tab">
						<a href="<?php echo esc_url($id); ?>">
							<div class="icon-sm">
								<i class="icon <?php echo esc_attr($item->icon); ?>"></i>
							</div>
							<h5 class="text-white"><?php echo $item->title; ?></h5>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="panel-container">
					<?php $count = 1; ?>
					<?php foreach($items as $item): ?>
					<?php $id = sprintf('tab-section%s-%s',$bid,$count++); ?>
					<div class="tab-content" id="<?php echo esc_attr($id); ?>">
						<?php $view->outputModule($item->module); ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

</section>