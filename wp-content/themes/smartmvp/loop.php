<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list( $settings ) = $t->template->data(); ?>
<?php $pager = empty( $settings->pager ) || $settings->pager === 'yes'; ?>
<?php $isSingle = is_single(); ?>
<?php while ( $content->looping() ) : ?>

	<?php $meta = $content->meta(); ?>
	<?php $link = get_permalink(); ?>
	<?php $type = $content->type(); ?>
	<?php $hasFeatImage = $content->hasFeatImage(); ?>
	<?php $classes = is_sticky() ? 'post post-single sticky' : 'post post-single'; ?>

	<div class="blog-post <?php echo $classes; ?>">

		<div class="post-title">
			<h4>

				<?php if ( $isSingle ) : ?>

					<?php $content->title(); ?>

				<?php else : ?>
					
					<a href="<?php echo $link ?>"><?php $content->title() ?></a>

				<?php endif; ?>

			</h4>
			<div class="post-meta">
				<h6>
					<?php if ( ! $isSingle ): ?>

						<span class="date">

							<?php _e("Posted ",'Pixelentity Theme/Plugin'); ?>
							<a href="<?php echo $link ?>">

								<?php the_time( 'd' ); ?> <?php the_time( 'M' ); ?>

							</a> /

						</span>

					<?php else: ?>

						<span class="date">
							<?php _e("Posted ",'Pixelentity Theme/Plugin'); ?>
							<?php the_time( 'd' ); ?> <?php the_time( 'M' ); ?> / 

						</span>

					<?php endif; ?>
					<?php _e("By ",'Pixelentity Theme/Plugin'); ?>
					<?php the_author_posts_link(); ?> / 
					<?php _e("In ",'Pixelentity Theme/Plugin'); ?><?php $content->category(); ?></h6>
			</div>
		</div>

		<?php if ( ! post_password_required( $post->ID ) ): ?>

			<div class="post-media">

				<?php switch( $content->format() ): case "gallery": // Gallery post ?>
				
						<?php $t->media->w( 750 ); ?>
						<?php $t->media->h( 0 ); ?>
						<?php $t->gallery->output( $meta->gallery->id, 'GalleryImages' ); ?>

					<?php break; case "video": // Video post ?>

						<?php $videoID = $t->content->meta()->video->id; ?>

						<?php if ( $video = $t->video->getInfo( $videoID ) ) : ?>

							<div class="vendor">

								<?php switch($video->type): case "youtube": ?>

									<iframe width="1280" height="720" src="//www.youtube.com/embed/<?php echo esc_attr( $video->id ); ?>?autohide=1&modestbranding=1&showinfo=0" class="fullwidth-video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								
								<?php break; case "vimeo": ?>

									<iframe src="//player.vimeo.com/video/<?php echo esc_attr( $video->id ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" class="fullwidth-video" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								
								<?php endswitch; ?>

							</div>

						<?php endif; ?>

					<?php break; default: // Standard post ?>

						<?php if ( $hasFeatImage ): ?>

							<?php $content->img( 750, 0 ); ?>

						<?php endif; ?>

				<?php endswitch; ?>

			</div>
			
		<?php endif; ?>

		<div class="post-body pe-wp-default">

			<?php $content->content(); ?>
			<?php $content->linkPages(); ?>

		</div>

		<?php if ( $isSingle && $type === 'post' && has_tag() ) : ?>

			<div class="tags">

				<?php the_tags( '', ' ', '' ); ?>

			</div>

		<?php endif; ?>

		<?php if ( $isSingle && is_singular( 'post' ) ) : ?>

			<?php get_template_part( 'common', 'prevnext' ); ?>

		<?php endif; ?>

		<?php if ( $isSingle ): ?>

			<?php comments_template(); ?>

		<?php endif; ?>

	</div>

<?php endwhile; ?>

<?php if ( $pager && ! $isSingle ) : ?>

	<?php $t->content->pager(); ?>

<?php endif; ?>