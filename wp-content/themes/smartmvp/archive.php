<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php 

if ( is_day() ) {
        $date = get_the_date();
} elseif ( is_month() ) {
        $date = get_the_date('F Y');
} elseif ( is_year() ) {
        $date = get_the_date('Y');
} else {
        $date = __("Archives",'Pixelentity Theme/Plugin');
}

?>
<?php $t->layout->pageTitle = $date; ?>
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