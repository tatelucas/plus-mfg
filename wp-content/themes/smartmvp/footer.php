<?php $t =& peTheme(); ?>
<?php $layout =& $t->layout; ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>

	<footer class="footer dark-bg" id="footer">

		<div class="container">
			<div class="wrapper-lg">
				<div class="row">

					<?php

					$footer_title = $t->options->get( 'footerTitle' );
					$footer_hero  = $t->options->get( 'footerHero' );
					$footer_cta   = $t->options->get( 'footerCta' );
					$offset = '';

					?>

					<?php if ( $footer_title || $footer_hero || $footer_cta ) : ?>

						<?php $offset = 'col-md-offset-3'; ?>

						<div class="col-md-6">

							<?php echo $footer_title; ?>

							<?php if ( $footer_hero ): ?>

								<p class="footer-hero">
									<?php echo $footer_hero; ?>
								</p>

							<?php endif; ?>

							<?php if ( $footer_cta ): ?>

								<p class="footer-cta">
									<?php echo $footer_cta; ?>
								</p>

							<?php endif; ?>

						</div>

					<?php endif; ?>

					<?php

					$contact_title = $t->options->get( 'contactTitle' );
					$contact_mail = $t->options->get( 'contactMail' );
					$contact_address = $t->options->get( 'contactAddress' );
					$contact_phone = $t->options->get( 'contactPhone' );

					?>

					<?php if ( $contact_title || $contact_mail || $contact_address || $contact_phone ) : ?>

						<div class="col-md-3 <?php echo $offset; ?>">

							<?php if ( $contact_title ): ?>

								<h5 class="text-white"><?php echo $contact_title; ?></h5>

							<?php endif; ?>

							<?php if ( $contact_mail ): ?>

								<div class="contact-item">
									<div class="contact-icon">
										<i class="icon icon_mail"></i>
									</div>
									<div class="contact-content">
										<a href="mailto:<?php echo sanitize_email( $contact_mail ); ?>"><?php echo antispambot( $contact_mail ); ?></a>
									</div>
								</div>

							<?php endif; ?>

							<?php if ( $contact_address ): ?>

							<div class="contact-item">
								<div class="contact-icon">
									<i class="icon icon_pin"></i>
								</div>
								<div class="contact-content">
									<?php echo $contact_address; ?>
								</div>
							</div>

							<?php endif; ?>

							<?php if ( $contact_phone ): ?>

								<div class="contact-item">
									<div class="contact-icon">
										<i class="icon icon_phone"></i>
									</div>
									<div class="contact-content">
										<?php echo $contact_phone; ?>
									</div>
								</div>

							<?php endif; ?>

						</div>

					<?php endif; ?>

					<div class="row">
						<div class="col-md-12">

							<?php $footer_links =  $t->options->get( 'footerLinks' ); ?>

							<?php if ( ! empty( $footer_links ) && is_array( $footer_links ) ) : ?>

								<ul class="footer-nav">

									<?php foreach ( $footer_links as $footer_link ) : ?>

										<li>
											<a href="<?php echo esc_attr( $footer_link['url'] ); ?>"><?php echo $footer_link['text']; ?></a>
										</li>

									<?php endforeach; ?>

								</ul>

							<?php endif; ?>

							<?php if ( $t->options->get( 'footerCopyright' ) ) : ?>

								<p class="footer-copy"><?php echo $t->options->get( 'footerCopyright' ); ?></p>

							<?php endif; ?>

						</div>
					</div>

				</div>
			</div>
		</div>

	</footer>

</div>

<?php $t->footer->wp_footer(); ?>

</body>
</html>
