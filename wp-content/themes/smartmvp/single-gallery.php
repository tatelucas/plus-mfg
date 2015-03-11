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

				<?php if ( $loop = $t->gallery->getSliderLoop( get_the_id() ) ) : ?>

					<div class="flexslider">
						<ul class="slides">

						<?php while ( $item =& $loop->next() ): ?>

							<li><?php echo $t->image->resizedImg( $item->img, 1280, 0 ); ?></li>

						<?php endwhile; ?>

						</ul>
					</div>

				<?php endif; ?>

			<?php else : ?>

				<?php echo get_the_password_form(); ?>

			<?php endif; ?>

		</div>

	</div>
</section>

<?php get_footer(); ?>