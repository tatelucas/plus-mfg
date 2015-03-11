<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>

<div class="container">
	<div class="row">
		<!-- Feature Description 2cols Text-Left with Buttons -->
		<div class="col-md-5 col-sm-6">
			<?php if (!empty($data->stitle)): ?>
			<h4><?php echo $data->stitle; ?></h4>
			<?php endif; ?>
			<?php if (!empty($data->content)): ?>
			<?php echo $data->content; ?>
			<?php endif; ?>
			<!-- Call To Action Buttons -->
			<div class="btn-box">
				<?php if (!empty($data->button1_text) && !empty($data->button1_url)): ?>
				<a href="<?php echo esc_url($data->button1_url); ?>" class="btn btn-grey <?php echo ($data->button1_url[0] === '#' ? 'scrollto' : ''); ?>">
					<?php echo $data->button1_text; ?>
				</a>
				<?php endif; ?>
				<?php if (!empty($data->button2_text) && !empty($data->button2_url)): ?>
				<a href="<?php echo esc_url($data->button2_url); ?>" class="btn btn-grey <?php echo ($data->button2_url[0] === '#' ? 'scrollto' : ''); ?>">
					<?php echo $data->button2_text; ?>
				</a>
				<?php endif; ?>
			</div>
		</div>

		<?php if (!empty($data->image)): ?>
		<div class="col-md-7 col-sm-6 hidden-xs wow fadeInRight" data-wow-duration="2s">
			<img src="<?php echo esc_url($data->image); ?>" alt="" />
		</div>
		<?php endif; ?>

	</div>
</div>
