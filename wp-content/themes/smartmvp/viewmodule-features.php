<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-features intro-features <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container">
		<!-- Padding -->
		<div class="wrapper-lg">
			<div class="row">
				<!-- Section Header Title -->
				<div class="col-xs-12">
					<?php if (!empty($data->title)): ?>
					<h2><?php echo $data->title; ?></h2>
					<?php endif; ?>
					<?php if (!empty($data->subtitle)): ?>
					<?php echo strtr($data->subtitle,array('<p>'=>'<p class="large">')); ?>
					<?php endif; ?>
				</div>
			</div>
			
			<?php if (!empty($items)):
									 $items_count = count( $items );
									 $column = ( 12 / $items_count < 3 ) ? 4 : 12 / $items_count;
									 if ( 3 === $column ) $column = '6';
									 if ( 12 === $column ) $column = '6 col-sm-offset-3';
			?>

			<div class="row">
				<?php foreach ($items as $item): ?>
				<div class="col-sm-<?php echo $column; ?> intro-content">

					<?php if (!empty($item->icon)): ?>
					<div class="icon-lg">
						<?php if (!empty($item->link)): ?>
						<a href="<?php echo esc_url( $item->link ); ?>" target="_blank">
							<i class="icon <?php echo esc_attr( $item->icon ); ?>"></i>
						</a>
						<?php else: ?>
						<i class="icon <?php echo esc_attr( $item->icon ); ?>"></i>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if (!empty($item->title)): ?>
					<h4><?php echo $item->title; ?></h4>
					<?php endif; ?>

					<?php if (!empty($item->content)): ?>
					<?php echo $item->content; ?>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

</section>