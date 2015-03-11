<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>

<div class="container">
	<div class="row">
		<!-- Feature Description 2col Text both -->
		<div class="col-xs-12">
			<div class="col-sm-6">
				<?php if (!empty($data->ctitle1)): ?>
				<h4><?php echo $data->ctitle1; ?></h4>
				<?php endif; ?>
				<?php if (!empty($data->content1)): ?>
				<?php echo $data->content1; ?>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php if (!empty($data->ctitle1)): ?>
				<h4><?php echo $data->ctitle1; ?></h4>
				<?php endif; ?>
				<?php if (!empty($data->content2)): ?>
				<?php echo $data->content2; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if (!empty($data->image)): ?>
	<div class="row">
		<!-- Image below --> 
		<div class="col-xs-12 hidden-xs wow fadeInUp" data-wow-duration="2s">
			<img src="<?php echo esc_url($data->image); ?>" alt="" class="img-device" />
		</div>
	</div>
	<?php endif; ?>
</div>