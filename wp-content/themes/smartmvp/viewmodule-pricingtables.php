<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-pricingtables pricing <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container">
		<div class="wrapper-lg">

			<div class="row">
				<div class="col-xs-12">
					<?php if (!empty($data->title)): ?>
					<h2><?php echo $data->title; ?></h2>
					<?php endif; ?>
					<?php if (!empty($data->subtitle)): ?>
					<?php echo strtr($data->subtitle,array('<p>'=>'<p class="large">')); ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if (!empty($items)): ?>
			<?php
				$items_count = count( $items );
				$column = ( 12 / $items_count < 3 ) ? 4 : 12 / $items_count;
				if ( 12 === $column ) $column = '4 col-sm-offset-4';
			?>

			<div class="row grid-md">
				<?php foreach ($items as $item): ?>
				<div class="col-sm-<?php echo $column; ?>">
					<div class="pricing-tab">
						<?php if (!empty($item->ribbon)): ?>
						<div class="ribbon">
							<h5 class="popular"><?php echo $item->ribbon; ?></h5>
						</div>
						<?php endif; ?>
						<?php if (!empty($item->price)): ?>
						<p class="price"><?php echo $item->price; ?></p>
						<?php endif; ?>
						<?php if (!empty($item->plan)): ?>
						<h4><?php echo $item->plan; ?></h4>
						<?php endif; ?>
						<?php if (!empty($item->features)): ?>
						<ul class="pricing-features">
							<?php foreach ($item->features as $feature): ?>
							<li><?php echo $feature["text"]; ?></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
						<?php if (!empty($item->button_text) && !empty($item->button_url)): ?>
						<a href="<?php echo esc_url($item->button_url); ?>" class="btn btn-color <?php echo ($item->button_url[0] === '#' ? 'scrollto' : ''); ?>">
							<?php echo $item->button_text; ?>
						</a>
						<?php endif; ?>
					</div>
				</div>

				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $data->content ) ) : ?>

				<div class="row grid-md">
					<div class="col-sm-12">
						<div class="pricing-more">

							<?php echo $data->content; ?>

						</div>
					</div>
				</div>

			<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

</section>