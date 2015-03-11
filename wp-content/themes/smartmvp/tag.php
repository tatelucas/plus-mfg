<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php $t->layout->pageTitle = sprintf(__("Tag: %s",'Pixelentity Theme/Plugin'),single_tag_title("",false)); ?>
<?php get_header(); ?>

<section class="container row-header-title">
	<div class="row">
		<div class="col-sm-12">

			<div class="header-title">

				<h1><?php echo $t->layout->pageTitle; ?></h1>

			</div>

		</div>
	</div>
</section>

<section class="container">
	<div class="row">

		<div class="col-sm-8">

			<?php $t->content->loop(); ?>

		</div>

		<div class="col-sm-4">

			<?php get_sidebar(); ?>

		</div>

	</div>
</section>

<?php get_footer(); ?>