<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-team team <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

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

			<?php if (!empty($items)): ?>
			<?php
				$items_count = count( $items );
				$column = ( 12 / $items_count < 3 ) ? 4 : 12 / $items_count;
				if ( 12 === $column ) $column = '4 col-sm-offset-4';
			?>
			<div class="row">
				<?php foreach ($items as $item): ?>
				<div class="col-sm-<?php echo $column; ?> team-box">
					<div class="team-img">
						<?php if (!empty($item->image)): ?>
						<img src="<?php echo esc_url($item->image); ?>" alt="" class="img-responsive" />
						<?php endif; ?>
						<div class="img-overlay">
							<?php if (!empty($item->icons)): ?>
							<div class="img-icons">
								<?php foreach ($item->icons as $icon): $icon = (object) $icon; ?>
								<span class="icon-white">
									<a href="<?php echo esc_url($icon->url); ?>">
										<i class="icon <?php echo esc_attr($icon->icon); ?>"></i>
									</a>
								</span>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php if (!empty($item->name)): ?>
					<h4><?php echo $item->name; ?></h4>
					<?php endif; ?>
					<?php if (!empty($item->content)): ?>
					<?php echo strtr($item->content,array('<p>'=>'<p class="team-bio">')); ?>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
		</div>
	</div>


</section>