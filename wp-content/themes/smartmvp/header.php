<!DOCTYPE html>
<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>
<!--[if IE 8 ]><html class="desktop ie8 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="desktop ie9 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes();?>><!--<![endif]-->
   
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="format-detection" content="telephone=no" />

		<!--[if lt IE 9]>
		<script type="text/javascript">/*@cc_on'abbr article aside audio canvas details figcaption figure footer header hgroup mark meter nav output progress section summary subline time video'.replace(/\w+/g,function(n){document.createElement(n)})@*/</script>
		<![endif]-->
		<script type="text/javascript">if(Function('/*@cc_on return document.documentMode===10@*/')()){document.documentElement.className+=' ie10';}</script>
		<script type="text/javascript">(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo esc_url( $t->options->get("favicon") ); ?>" />

		<?php $t->font->load(); ?>

		<!-- wp_head() -->
		<?php $t->header->wp_head(); ?>
	</head>

	<body <?php $content->body_class(); ?>>

		<div class="main-wrapper">

			<div class="preloader">
				<div class="loader-container">

					<?php $logo = $t->options->get( 'logo' ); ?>

					<?php if ( ! empty( $logo ) ) : ?>

						<div class="img-logo"><img src="<?php echo esc_url( $logo ); ?>" alt="Logo"></div>

					<?php else : ?>

						<div class="text-logo"><?php echo $t->options->get( 'siteTitle' );?></div>

					<?php endif; ?>

				</div>
			</div>
				
			<header class="header <?php echo ( is_page() ) ? esc_attr( $meta->splash->type ) : ''; ?>" id="top" data-stellar-background-ratio="0.5">

				<?php if ( is_page() && 'none' !== $meta->splash->type ) : ?>

					<?php if ( 'slider' !== $meta->splash->type ) : ?>

						<?php

						$overlay_class = '';

						if ( empty( $meta->splash->background_image ) && ( ! $meta->splash->background_video || -1 !== $meta->splash->background_video ) ) {

							$overlay_class = 'is-transparent';

						}

						?>

						<div class="overlay <?php echo $overlay_class; ?>">

							<?php if ( $meta->splash->background_video && -1 !== $meta->splash->background_video && $video = $t->video->getInfo( $meta->splash->background_video ) ) : ?>

								<div id="P1" class="player" data-property="{videoURL:'<?php echo esc_attr( $video->url ); ?>',containment:'#top',startAt:0,mute:true,autoPlay:true,loop:false,opacity:1,showYTLogo:false,showControls:false}"></div>

							<?php endif; ?>

							<?php get_template_part( 'menu' ); ?>

							<?php get_template_part( 'hero', $meta->splash->type ); ?>

						</div>

						<div
							class="header-values"
							data-background-image="<?php echo esc_attr( $meta->splash->background_image ); ?>"
							data-background-color="<?php echo esc_attr( $meta->splash->background_color ); ?>"
						>
						</div>

					<?php else : ?>

						<?php get_template_part( 'hero', $meta->splash->type ); ?>

						<?php get_template_part( 'menu' ); ?>

					<?php endif; ?>


				<?php else : ?>

					<?php get_template_part( 'menu' ); ?>

				<?php endif; ?>

			</header>