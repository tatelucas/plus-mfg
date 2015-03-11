<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-download mobile-download light-bg <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

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

			<div class="row">
				<!-- Text and Mobile Download Buttons -->
				<div class="col-sm-6 col-md-4">
					<?php if (!empty($data->ctitle)): ?>
					<h3><?php echo $data->ctitle; ?></h3>
					<?php endif; ?>
					<?php if (!empty($data->content)): ?>
					<?php echo strtr($data->content,array('<p>'=>'<p class="mobile-text">')); ?>
					<?php endif; ?>

					<?php if (!empty($data->button_text) && !empty($data->button_url)): ?>
					<a href="<?php echo esc_url($data->button_url); ?>" class="btn btn-color <?php echo ($data->button_url[0] === '#' ? 'scrollto' : ''); ?>">
						<i class="icon icon_cloud-download_alt"></i>
						<?php echo $data->button_text; ?>
					</a>
					<?php endif; ?>
				</div>
				
				<?php if (!empty($items)): ?>
				<div class="col-sm-6 col-md-4">
					<!-- Screenshot Carousel -->
					<div class="shot-container">
						<div id="owl-carousel-shots-phone" class="owl-carousel">
							<?php foreach($items as $item): ?>
							<?php if (!empty($item->image)): ?>
							<div class="owl-container text-center shots-modal">
								<img src="<?php echo esc_url($item->image); ?>" alt=""  />
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div><!-- /End owl carousel-->
					</div><!-- /End Container -->
				</div>

				<div class="col-sm-12 col-md-4 right-features">
					<?php foreach($items as $item): ?>
					<?php if (!empty($item->name) || !empty($item->content)): ?>
					<div class="col-sm-4 col-md-12">
						<?php if (!empty($item->name)): ?>
						<h4><?php echo $item->name; ?></h4>
						<?php endif; ?>
						<?php if (!empty($item->content)): ?>
						<?php echo $item->content; ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div><!-- /End Row -->

		</div>
	</div>

</section>