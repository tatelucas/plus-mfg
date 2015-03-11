<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<?php if ( wp_attachment_is_image( $post->id ) ) : ?>

	<section class="container">
		<div class="row">

			<div class="col-sm-8 col-sm-offset-2">

				<div class="post-title">
					<h4><?php $content->title(); ?></h4>
				</div>

				<?php if ( ! post_password_required( $post->ID ) ): ?>

					<div class="post-media">

						<?php $img = wp_get_attachment_image_src( $post->id, 'full' ); ?>
						<?php $content->img( 1140, 0, $img[0] ); ?>

					</div>
					
				<?php else : ?>

					<?php echo get_the_password_form(); ?>

				<?php endif; ?>

			</div>

		</div>
	</section>

<?php endif; ?>

<?php get_footer(); ?>