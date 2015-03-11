+( function( $ ) {

	'use strict';

	var $window  = $( window );

	var sections = [];

	$window.on( 'load resize', pe_calculate_sections );

	function pe_calculate_sections() {

		sections = [];

		$( 'section[id]' ).each( function( i ) {

			var $this = $( this );

			sections.push( $this.outerHeight() + $this.offset().top );

		});

		$window.trigger( 'scroll' );

	}

	function convertHex( hex, opacity ) {

		hex = hex.replace( '#', '' );

		var r = parseInt( hex.substring( 0, 2 ), 16 ),
			g = parseInt( hex.substring( 2, 4 ), 16 ),
			b = parseInt( hex.substring( 4, 6 ), 16 );

		var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';

		return result;

	}

	$( function() {

		var $window  = $( window ),
			$body    = $( 'body' ),
			$header  = $( 'header#top' ),
			$overlay = $body.find( '.overlay' ),
			$nav     = $( '#navigation, .navigation' ).first(),
			loggedIn = $( '.admin-bar' ).length,
			isMobile = $window.width() < 1024;

		if ( ! $overlay.length ) {

			$nav.closest( 'nav' ).addClass( 'innernav' );
			$header.addClass( 'hasinnernav' );

		} else {

			var $header_val = $( '.header-values' ),
				bg_image    = $header_val.attr( 'data-background-image' ),
				bg_color    = $header_val.attr( 'data-background-color' );

			if ( bg_image ) {

				$header.css( 'background-image', 'url(' + bg_image + ')' );

			}

			if ( bg_color ) {

				$header.css( 'background-color', bg_color );

			}

		}

		if ( $( '.peThemeContactForm' ).length > 0 ) {

			$( '.peThemeContactForm' ).peThemeContactForm();

		}

		jQuery( '.vendor' ).fitVids();

		if ( $nav.length ) {

			$nav.addClass( 'nav navbar-right navbar-nav' );

			$nav
				.find( 'a' )
					.each( function() {

						var $this = $( this );

						if ( '' === $this.prop( 'hash' ) || ! ( window.location.pathname === $this.prop( 'pathname' ) && window.location.origin === $this.prop( 'origin' ) ) ) {

							$this.addClass( 'is-external' );

						} else {

							$this.addClass( 'scrollto' );

						}

					});

			$nav.find( '.active' ).removeClass( 'active current-menu-item' ).first().addClass( 'current-menu-item' );

			$window.scroll( function() {

				var scrollTop = $window.scrollTop();

				$( sections ).each( function( i, value ) {

					var offset = loggedIn ? 32 : 0;

					offset = isMobile ? 0 : offset;

					value = value - $nav.height() - offset - 4;

					if ( 0 === i && $( 'section' ).first().offset().top - offset - $nav.height() - 4 > $window.scrollTop() ) {

						$nav.find( 'li' ).removeClass( 'current-menu-item' );

						$nav.find( 'li a[href="' + window.location.href.replace( window.location.hash, '' ) + '"]' ).parent().addClass( 'current-menu-item' );

						return false;

					}

					if ( scrollTop < value ) {

						var id = $( 'section' ).eq( i ).attr( 'id' );

						$nav.find( 'li' ).removeClass( 'current-menu-item' ).each( function() {

							var $href = $( this ).children( 'a' ).attr( 'href' );

							if ( $href.indexOf( '#' + id ) > 0 ) {

								$( this ).addClass( 'current-menu-item' );

								return false;

							}

						});

						return false;

					}

				});

			});

		}

		var $yt_video = $( '.player' );

		if( $yt_video.length && ! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

			$header.css( 'background-image', '' );

			$( '.player' ).mb_YTPlayer();

		}

		// Pie charts
		$( '.start-pie-charts' ).each( function() {

			var $this    = $( this ),
				$section = $this.closest( 'section' );

			$this.waypoint( function( direction ) {

				var chart_started = $this.data( 'chart-started' );
				
				if ( chart_started ) {

					// We already did this, bail out
					return;

				}

				$this.data( 'chart-started', true );

				var $charts = $section.find( '.pie-chart-area' );

				$charts.each( function() {

					var $chart      = $( this ),
						$chart_data = $chart.siblings( '.pie-chart-data' ),
						chart_data = [];

					$chart_data
						.children()
							.each( function() {

								var $data_point = $( this ),
									label       = $data_point.attr( 'data-label' ),
									value       = $data_point.attr( 'data-value' ),
									color       = $data_point.attr( 'data-color' ),
									highlight   = $data_point.attr( 'data-highlight' ),
									data_object;

								data_object = {
									value    : parseInt( value, 10 ),
									color    : color,
									highlight: highlight,
									label    : label
								};

								chart_data.push( data_object );

							});

					var ctx = $chart[0].getContext( '2d' );
					window.myDoughnut = new Chart( ctx ).Doughnut( chart_data, { responsive : true } );

				});

			}, {
				offset: 320
			});

		});

		// Area charts
		$( '.start-area-charts' ).each( function() {

			var $this    = $( this ),
				$section = $this.closest( 'section' );

			$this.waypoint( function( direction ) {

				var chart_started = $this.data( 'chart-started' );
				
				if ( chart_started ) {

					// We already did this, bail out
					return;

				}

				$this.data( 'chart-started', true );

				var $charts = $section.find( '.area-chart-area' );

				$charts.each( function() {

					var $chart      = $( this ),
						$chart_data = $chart.siblings( '.area-chart-data' ),
						chart_data  = {};

					chart_data.labels = $chart_data.attr( 'data-labels' ).split( ',' );
					chart_data.datasets = [];

					$chart_data
						.children()
							.each( function() {

								var $data_point = $( this ),
									values = $data_point.attr( 'data-values' ),
									color  = $data_point.attr( 'data-color' ),
									data_object;

								data_object = {
									strokeColor         : color,
									pointColor          : color,
									pointHighlightStroke: color,
									fillColor           : convertHex( color, 20 ),
									pointStrokeColor    : '#fff',
									pointHighlightFill  : '#fff',
									data                : values.split( ',' )
									
								};

								$.each( data_object.data, function( i, val ) {

									data_object.data[ i ] = parseInt( val, 10 );

								});

								chart_data.datasets.push( data_object );

							});

					

					var ctx = $chart[0].getContext( '2d' );
					window.myDoughnut = new Chart( ctx ).Line( chart_data, { responsive : true } );

				});

			}, {
				offset: 320
			});

		});

		$( '#slides' ).superslides({
			play      : 6000,
			animation : 'fade',
			pagination: false
		});

		$( '.newsletter' ).each( function() {

			var $this = $( this );

			$this.find( '.input-group br' ).remove();
			$this.find( '.col-md-6 > p' ).remove();

			$this.find( 'form' ).attr( 'action', window.location.protocol + '//' + window.location.hostname + window.location.pathname + window.location.search + '#' + $this.attr( 'id' ) );

		});

		var $footer_hero = $( '.footer-hero' ),
			$footer_nav  = $( '.footer-nav' );

		if ( ! $footer_hero.length && $footer_nav.length ) {

			$footer_nav.addClass( 'no-margin' );

		}

		$body.on( 'submit', 'form.signup-divider', function( e ) {

			e.preventDefault();

			var $form           = $( this ),
				$success_msg    = $form.find( '.signup-success strong' ),
				$error_msg      = $form.find( '.signup-failed strong' ),
				$username       = $form.find( '[name="signup-username"]' ),
				$email          = $form.find( '[name="signup-email"]' ),
				$nonce          = $form.find( '[name="signup-nonce"]' ),
				form_submitting = $form.data( 'pe-submitting' );

			if ( form_submitting ) {

				// form is already submitting, bail out
				return;

			}

			$.post(
				_smartmvp.ajax_url,
				{	
					action   : 'pe_signup_form_submit',
					pe_user  : $username.val(),
					pe_mail  : $email.val(),
					pe_nonce : $nonce.val()
				},
				function( response ) {

					$form.data( 'pe-submitting', false );

					if ( 'undefined' !== typeof response.success ) {

						$success_msg.text( '' ).parent().hide();
						$error_msg.text( '' ).parent().hide();

						if ( response.success ) {

							$success_msg.text( response.msg ).parent().show();

						} else {

							$error_msg.text( response.msg ).parent().show();

						}

					}

				},
				'json'
			);

		});

		jQuery( '[data-canvas-highlight]' ).each( function() {

			var $container     = $( this ),
				light_color    = $container.attr( 'data-canvas-bg' ).replace( '#', '' ).toUpperCase(),
				material_color = $container.attr( 'data-canvas-highlight' ).replace( '#', '' ).toUpperCase();

			if ( 3 === light_color.length ) {

				light_color += light_color;

			}

			if ( 3 === material_color.length ) {

				material_color += material_color;

			}

			var renderer = new FSS.CanvasRenderer(),
				scene    = new FSS.Scene(),
				light    = new FSS.Light( light_color, light_color ),
				geometry = new FSS.Plane( 2000, 1000, 15, 8 ),
				material = new FSS.Material( material_color, material_color ),
				mesh     = new FSS.Mesh( geometry, material ),
				now,
				start    = Date.now();

			function initialise() {

				scene.add( mesh );
				scene.add( light );
				$container[0].appendChild( renderer.element );
				window.addEventListener( 'resize', resize );

			}

			function resize() {

				renderer.setSize( $container[0].offsetWidth, $container[0].offsetHeight );

			}

			function animate() {

				now = Date.now() - start;
				light.setPosition( 300 * Math.sin( now * 0.001 ), 200 * Math.cos( now * 0.0005 ), 60 );
				renderer.render( scene );
				requestAnimationFrame( animate );

			}

			initialise();
			resize();
			animate();

		});

		$window.on( 'load', function() {

			$( '.flexslider' ).each( function() {

				var $this         = $( this );

				$this.flexslider({
					animation      : 'slide',
					smoothHeight   : true,
					slideshowSpeed : 7000,
					controlNav     : false
				});

			});

		});

	});

})( jQuery );