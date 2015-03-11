<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<section class="container">
	<div class="row">

		<div class="col-sm-8 col-sm-offset-2">

			<div class="post-title">
				<h4><?php $content->title(); ?></h4>
			</div>

			<?php if ( ! post_password_required( $post->ID ) ) : ?>

				<?php $t->video->output(get_the_id()); ?>

			<?php else : ?>

				<?php echo get_the_password_form(); ?>

			<?php endif; ?>

		</div>

	</div>
</section>

<?php get_footer(); ?>