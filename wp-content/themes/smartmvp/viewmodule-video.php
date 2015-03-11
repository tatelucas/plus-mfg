<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-video charts <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container">
		<div>
			<div class="row showcase">
				
				<div class="col-md-4">
					<?php if (!empty($data->content)): ?>
					<?php echo $data->content; ?>
					<?php endif; ?>
				</div>

				<div class="col-md-8">
					<!-- Devices Image -->
					<div class="img-box">
						<?php if (!empty($data->image)): ?>
						<img src="<?php echo esc_url($data->image); ?>" alt="" class="img-responsive" />
						<?php endif; ?>
						<?php if (!empty($data->video)): ?>
						<a href="<?php echo esc_url($data->video); ?>" data-type="youtube" class="venobox video-player"><i class="icon arrow_triangle-right_alt2 wow fadeIn" data-wow-duration="2s"></i></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>