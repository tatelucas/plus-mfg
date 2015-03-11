<?php

class PeThemeSmartMVPAsset extends PeThemeAsset  {

	public function __construct(&$master) {

		$this->minifiedJS = 'theme/compressed/theme.min.js';
		$this->minifiedCSS = 'theme/compressed/theme.min.css';

		//define( 'PE_THEME_LOCAL_VIDEO_SUPPORT',true);

		parent::__construct($master);
		
	}

	public function registerAssets() {

		add_filter( 'pe_theme_js_init_file',array(&$this, 'pe_theme_js_init_file_filter' ));
		add_filter( 'pe_theme_js_init_deps',array(&$this, 'pe_theme_js_init_deps_filter' ));
		add_filter( 'pe_theme_minified_js_deps',array(&$this, 'pe_theme_minified_js_deps_filter' ));
		
		parent::registerAssets();

		if ($this->minifyCSS) {

			$deps = array(
				'pe_theme_compressed',
			);

		} else {

			// theme styles
			$this->addStyle( 'assets/css/plugins/bootstrap.min.css',array(), 'pe_theme_smartmvp-bootstrap' );
			$this->addStyle( 'assets/css/icons/icons.min.css',array(), 'pe_theme_smartmvp-icons' );
			$this->addStyle( 'assets/css/plugins/plugins.min.css',array(), 'pe_theme_smartmvp-plugins' );
			$this->addStyle( 'assets/css/style.css',array(), 'pe_theme_smartmvp-style' );
			$this->addStyle( 'assets/css/responsive.css',array(), 'pe_theme_smartmvp-responsive' );
			$this->addStyle( 'assets/css/colors/red.css',array(), 'pe_theme_smartmvp-color' );
			$this->addStyle( 'assets/css/blog.css',array(), 'pe_theme_smartmvp-blog' );
			$this->addStyle( 'assets/css/flexslider.css',array(), 'pe_theme_smartmvp-flexslider' );
			$this->addStyle( 'assets/css/custom.css',array(), 'pe_theme_smartmvp-custom' );

			$deps = array(
				'pe_theme_smartmvp-bootstrap',
				'pe_theme_smartmvp-icons',
				'pe_theme_smartmvp-plugins',
				'pe_theme_smartmvp-style',
				'pe_theme_smartmvp-responsive',
				'pe_theme_smartmvp-color',
				'pe_theme_smartmvp-blog',
				'pe_theme_smartmvp-flexslider',
				'pe_theme_smartmvp-custom',
			);

		}

		$this->addStyle( 'style.css',$deps, 'pe_theme_init' );

		$this->addScript( 'theme/js/pe/pixelentity.controller.js', array(
			//'pe_theme_mobile',
			'pe_theme_utils_browser',
			'pe_theme_selectivizr',
			'pe_theme_lazyload',
			//'pe_theme_flare',
			'pe_theme_widgets_contact',
			'pe_theme_smartmvp-bootstrap',
			'pe_theme_smartmvp-easing',
			'pe_theme_smartmvp-modernizr',
			'pe_theme_smartmvp-plugins',
			'pe_theme_smartmvp-videoplugins',
			'pe_theme_smartmvp-superslides',
			'pe_theme_smartmvp-flexslider',
			//'pe_theme_smartmvp-tweetie',
			'pe_theme_smartmvp-main',
			'pe_theme_smartmvp-custom',
		), 'pe_theme_controller' );

		$this->addScript( 'assets/js/plugins/bootstrap.min.js',array(), 'pe_theme_smartmvp-bootstrap' );
		$this->addScript( 'assets/js/plugins/jquery.easing.1.3.min.js',array(), 'pe_theme_smartmvp-easing' );
		$this->addScript( 'assets/js/plugins/modernizr.custom.min.js',array(), 'pe_theme_smartmvp-modernizr' );
		$this->addScript( 'assets/js/plugins/plugins.min.js',array(), 'pe_theme_smartmvp-plugins' );
		$this->addScript( 'assets/js/plugins/videobg/videoplugins.min.js',array(), 'pe_theme_smartmvp-videoplugins' );
		$this->addScript( 'assets/js/plugins/slider/jquery.superslides.min.js',array(), 'pe_theme_smartmvp-superslides' );
		$this->addScript( 'assets/js/plugins/jquery.flexslider-min.js',array(), 'pe_theme_smartmvp-flexslider' );
		//$this->addScript( 'assets/js/plugins/twitter/tweetie.min.js',array(), 'pe_theme_smartmvp-tweetie' );
		$this->addScript( 'assets/js/main.js',array(), 'pe_theme_smartmvp-main' );
		$this->addScript( 'assets/js/custom.js',array(), 'pe_theme_smartmvp-custom' );
		
	}

	public function pe_theme_js_init_file_filter( $js ) {

		return $js;
		//return 'js/custom.js';

	}

	public function pe_theme_js_init_deps_filter( $deps ) {

		return $deps;
		/*
		  return array(
		  'jquery',
		  );
		*/
	}

	public function pe_theme_minified_js_deps_filter( $deps ) {

		return $deps;
		//return array( 'jquery' );

	}

	public function style() {

		bloginfo( 'stylesheet_url' ); 

	}

	public function enqueueAssets() {

		$this->registerAssets();

		$t =& peTheme();

		if ( $this->minifyJS && file_exists( PE_THEME_PATH . '/preview/init.js' ) ) {

			$this->addScript( 'preview/init.js', array( 'jquery' ), 'pe_theme_preview_init' );
			
			wp_localize_script( 'pe_theme_preview_init', 'o', array(
			//'dark' => PE_THEME_URL.'/css/dark_skin.css',
				'css' => $this->master->color->customCSS( true, 'color1' )
			) );

			wp_enqueue_script( 'pe_theme_preview_init' );

		}	

		wp_enqueue_style( 'pe_theme_init' );
		wp_enqueue_script( 'pe_theme_init' );

		wp_localize_script( 'pe_theme_init', '_smartmvp', array(
			'ajax_url'     => admin_url( 'admin-ajax.php' ),
 			'ajax-loading' => PE_THEME_URL . '/images/ajax-loader.gif',
			'home_url'     => home_url( '/' ),
		) );

		if ( $this->minifyJS && file_exists( PE_THEME_PATH . '/preview/preview.js' ) ) {

			$this->addScript( 'preview/preview.js',array( 'pe_theme_init' ), 'pe_theme_skin_chooser' );

			wp_localize_script( 'pe_theme_skin_chooser', 'pe_skin_chooser', array( 'url' => urlencode( PE_THEME_URL . '/' ) ) );
			wp_enqueue_script( 'pe_theme_skin_chooser' );

		}

		wp_enqueue_script( 'pe_theme_smartmvp-gmap', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false' );

	}


}