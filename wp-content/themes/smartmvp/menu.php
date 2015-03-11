<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<?php $template = is_page() ? $t->content->pageTemplate() : false; ?>

<nav class="navbar navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="navbar-header">

					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<i class="icon icon_menu"></i>
					</button>

					<?php $logo = $t->options->get( 'logo' ); ?>

					<?php if ( ! empty( $logo ) ) : ?>

						<a href="<?php echo home_url( '/' ); ?>" class="navbar-brand img-logo scrollto">
							<img src="<?php echo esc_url( $logo ); ?>" alt="Logo">
						</a> 

					<?php else : ?>

						<a href="<?php echo home_url( '/' ); ?>" class="navbar-brand scrollto">
							<span class="text-logo"><?php echo $t->options->get( 'siteTitle' );?></span>
						</a>

					<?php endif; ?>

				</div>


				<div class="navbar-collapse collapse">

					<?php $t->menu->show( 'main' ); ?>

				</div>
			</div>
		</div>
	</div>
</nav>