<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php if ( 'light' === $data->typography ) echo 'dark'; ?> section-type-blog padded" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>
	
	<div class="container">
		<div class="row">
	
			<div class="blog-content col-xs-12 col-md-8">

				<?php $t->content->loop(); ?>
					
			</div>

			<div class="col-xs-12 col-md-4">

				<?php get_sidebar(); ?>

			</div>

		</div>
	</div>

</section>