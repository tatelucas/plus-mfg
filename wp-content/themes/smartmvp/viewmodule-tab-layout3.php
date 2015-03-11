<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>

<div class="container">
	<div class="row">
		<!-- Feature Description 2cols Text-Right with Icons -->
		<div class="col-md-7 col-sm-6">
			<?php if (!empty($data->stitle)): ?>
			<h4><?php echo $data->stitle; ?></h4>
			<?php endif; ?>
				<?php if (!empty($data->content)): ?>
			<?php echo $data->content; ?>
			<?php endif; ?>

			<?php if (!empty($data->list)): ?>
			<?php foreach($data->list as $item): $item = (object) $item; ?>
			<div class="tab-icon">
				<div class="icon-sm">
					<i class="icon <?php echo esc_attr($item->icon); ?>"></i>
				</div>
				<p class="large"><?php echo $item->title ?></p>
				<p><?php echo $item->content; ?></p>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<?php if (!empty($data->image)): ?>
		<div class="col-md-5 col-sm-6 hidden-xs wow fadeInRight" data-wow-duration="2s">
			<img src="<?php echo esc_url($data->image); ?>" alt="" class="img-device" />
		</div>
		<?php endif; ?>
	</div>
</div>
