<?php

class PeThemeSmartMVP extends PeThemeController {

	public $preview = array();

	public function __construct() {

		// custom post types
		add_action("pe_theme_custom_post_type",array(&$this,"pe_theme_custom_post_type"));

		// wp_head stuff
		add_action("pe_theme_wp_head",array(&$this,"pe_theme_wp_head"));

		// google fonts
		add_filter("pe_theme_font_variants",array(&$this,"pe_theme_font_variants_filter"),10,2);

		// menu
		add_filter("pe_theme_menu_item_after",array(&$this,"pe_theme_menu_item_after_filter"),10,3);

		// custom menu fields
		add_filter("pe_theme_menu_custom_fields",array(&$this,"pe_theme_menu_custom_fields_filter"),10,3);

		// social links
		add_filter("pe_theme_social_icons",array(&$this,"pe_theme_social_icons_filter"));
		add_filter("pe_theme_content_get_social_link",array(&$this,"pe_theme_content_get_social_link_filter"),10,4);

		// comment submit button class
		add_filter("pe_theme_comment_submit_class",array(&$this,"pe_theme_comment_submit_class_filter"));

		// use prio 30 so gets executed after standard theme filter
		add_filter("the_content_more_link",array(&$this,"the_content_more_link_filter"),30);

		// remove junk from project screen
		add_action('pe_theme_metabox_config_project',array(&$this,'pe_theme_smartmvp_metabox_config_project'),200);

		// add featured image to testimonial
		add_action('init',array(&$this,'pe_theme_smartmvp_testimonial_supports'),200);

		// shortcodes
		add_filter("pe_theme_shortcode_columns_mapping",array(&$this,"pe_theme_shortcode_columns_mapping_filter"));
		add_filter("pe_theme_shortcode_columns_options",array(&$this,"pe_theme_shortcode_columns_options_filter"));
		add_filter("pe_theme_shortcode_columns_container",array(&$this,"pe_theme_shortcode_columns_container_filter"),10,2);

		// portfolio
		add_filter("pe_theme_filter_item",array(&$this,"pe_theme_project_filter_item_filter"),10,4);

		// remove staff meta
		add_action('pe_theme_metabox_config_staff',array(&$this,'pe_theme_metabox_config_staff_action'),11);

		// alter services meta
		add_action('pe_theme_metabox_config_service',array(&$this,'pe_theme_metabox_config_service_action'),11);

		// custom meta for gallery images
		add_filter( 'pe_theme_gallery_image_fields', array( $this, 'pe_theme_gallery_image_fields_filter' ) );

		// custom homepage meta js
		add_action( 'admin_enqueue_scripts', array( $this, 'pe_theme_smartmvp_custom_meta_js' ) );

		// custom video metabox
		add_action('pe_theme_metabox_config_video',array(&$this,'pe_theme_metabox_config_video'),99);

		// builder
		add_filter('pe_theme_view_layout_open',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_view_layout_close',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_layoutmodule_open',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_layoutmodule_close',array(&$this,'pe_theme_view_layout_no_parent'));

		// header versions for demo
		add_filter( 'pe_theme_smartmvp_header_type', array( $this, 'pe_theme_smartmvp_header_type_filter' ) );

		// menu wrapper
		add_filter( 'pe_theme_menu_items_wrap', array( $this, 'pe_theme_menu_items_wrap_filter' ) );

		add_filter( 'wp_title', array( $this, 'wp_title_filter' ), 10, 2 );

		add_action( 'wp_ajax_nopriv_pe_signup_form_submit', array( $this, 'pe_signup_form_submit' ) );

		add_theme_support( 'title-tag' );

	}

	public function wp_title_filter( $title, $sep ) {

		global $page, $paged;

		$title .= get_bloginfo( 'name' );

		if (( is_home() || is_front_page() ) ) {
			$description = get_bloginfo('description','display');
			if ($description) {
				$title .= " | ".$description;
			}
		}

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " | ".sprintf(__('Page %s','Pixelentity Theme/Plugin'),max($paged,$page));
		}

		return $title;	

	}

	public function pe_theme_smartmvp_header_type_filter( $header ) {

		if ( ! defined( 'PE_THEME_DEMO_SITE' ) || ! PE_THEME_DEMO_SITE ) return $header; //not a preview

		if ( empty( $_GET['header_type'] )  ) return $header; //manual header not set

		return sanitize_key( $_GET['header_type'] );

	}

	public function pe_theme_menu_items_wrap_filter( $html ) {

		return '<ul class="navigation">%3$s</ul>';

	}

	public function pe_theme_view_layout_no_parent( $markup ) {
		return "";
	}

	public function pe_theme_smartmvp_custom_meta_js() {

		//PeThemeAsset::addScript("js/smartmvp-homepage-meta.js",array('jquery'),"pe_theme_smartmvp_homepage_meta");
		PeThemeAsset::addStyle("assets/css/icons/icons.min.css",array(),"pe_theme_smartmvp_admin_icons");

		$screen = get_current_screen();

		if ( is_admin() && ( 'page' === $screen->post_type || 'post' === $screen->post_type || 'gallery' === $screen->post_type ) ) {
			//wp_enqueue_script("pe_theme_smartmvp_homepage_meta");
			wp_enqueue_style("pe_theme_smartmvp_admin_icons");
		}

	}

	public function the_content_more_link_filter( $link ) {
		return sprintf( '<a class="read-more-link blog-post-more" href="%s">%s</a>', get_permalink(), __( 'Continue Reading...' ,'Pixelentity Theme/Plugin') );
	}

	public function pe_theme_project_filter_item_filter( $html, $aclass, $slug, $name ) {
		return sprintf( '<li class="%s wow fadeInUp" data-filter="%s" data-wow-delay="0.8s">%s</li>', '' === $slug ? 'is-checked' : '','' === $slug ? '*' : ".filter-$slug", $name );
	}

	public function pe_theme_wp_head() {
		$this->font->apply();
		$this->color->apply();

		// custom CSS field
		if ($customCSS = $this->options->get("customCSS")) {
			$tag  = 'style';
			$type = 'text' . '/' . 'css';
			printf(
				'<%s type="%s">%s</%s>',
				$tag,
				$type,
				stripslashes($customCSS),
				$tag
			);
		}

		// custom JS field
		if ($customJS = $this->options->get("customJS")) {
			$tag  = 'script';
			$type = 'text' . '/' . 'javascript';
			printf(
				'<%s type="%s">%s</%s>',
				$tag,
				$type,
				stripslashes($customJS),
				$tag
			);
		}

	}

	public function pe_theme_font_variants_filter( $variants, $font ) {

		if ( $font === "Open Sans" ) {

			$variants="$font:400italic,300,400,700,800,100";

		}

		else if ( $font === "Lato" ) {

			$variants="$font:100,200,300,700";

		}

		else if ( $font === "Montserrat" ) {

			$variants="$font:400,700";

		}

		else if ( $font === "Volkhov" ) {

			$variants="$font:400italic,700italic,400,700";

		}

		else if ( $font === "Roboto" ) {

			$variants="$font:400,300,700,400italic,700italic,300italic,100";

		}

		else if ( $font === 'Bitter' ) {

			$variants="$font:regular:italic:bold";

		}

		else if ( $font === 'Raleway' ) {

			$variants="$font:400,700";

		}

		else if ( $font === 'Source Sans Pro' ) {

			$variants="$font:300,400,700,300italic,400italic,700italic";

		}

		else if ( $font === 'Cardo' ) {

			$variants="$font:400,400italic";

		}

		else if ( $font === 'Montserrat' ) {

			$variants="$font:400,700";

		}

		return $variants;

	}

	public function pe_theme_menu_custom_fields_filter( $options, $depth = false, $item = false ) {

		if ( ! empty( $item->object ) && $item->object != "page" ) {

			// if menu item is not a page, no custom option
			return $options;

		}

		$options = array(
			"name" => array(
				"label"       => __( "Section" ,'Pixelentity Theme/Plugin'),
				"type"        => "Text",
				"description" => __( "Optional section link name." ,'Pixelentity Theme/Plugin'),
				"default"     => "",
			)
		);

		return $options;

	}

	public function pe_theme_menu_item_after_filter($after,$item,$depth) {
		if ($item->object == 'page' && !empty($item->pe_meta->name)) {
			$section = strtr($item->pe_meta->name,array('#' => ''));
			$item->url .= "#section-$section";
		}
		return $after;
	}

	public function pe_theme_social_icons_filter($icons = null) {
		return array(
			// label => icon | tooltip text
			__( 'Behance' ,'Pixelentity Theme/Plugin')       => 'social-icon-behance|Behance',
			__( 'Codeopen' ,'Pixelentity Theme/Plugin')      => 'social-icon-codeopen|Codeopen',
			__( 'DeviantArt' ,'Pixelentity Theme/Plugin')    => 'social-icon-deviantart|DEviantArt',
			__( 'Digg' ,'Pixelentity Theme/Plugin')          => 'social-icon-digg|Digg',
			__( 'Dribbble' ,'Pixelentity Theme/Plugin')      => 'social-icon-dribbble|Dribbble',
			__( 'Dropbox' ,'Pixelentity Theme/Plugin')       => 'social-icon-dropbox|Dropbox',
			__( 'Drupal' ,'Pixelentity Theme/Plugin')        => 'social-icon-drupal|Drupal',
			__( 'Facebook' ,'Pixelentity Theme/Plugin')      => 'social-icon-facebook|Facebook',
			__( 'Git' ,'Pixelentity Theme/Plugin')           => 'social-icon-git|Git',
			__( 'GitHub' ,'Pixelentity Theme/Plugin')        => 'social-icon-github|GitHub',
			__( 'Google' ,'Pixelentity Theme/Plugin')        => 'social-icon-google|Google',
			__( 'Google+' ,'Pixelentity Theme/Plugin')       => 'social-icon-gplus|Google+',
			__( 'Instagram' ,'Pixelentity Theme/Plugin')     => 'social-icon-instagram|Instagram',
			__( 'Joomla' ,'Pixelentity Theme/Plugin')        => 'social-icon-joomla|Joomla',
			__( 'LinkedIn' ,'Pixelentity Theme/Plugin')      => 'social-icon-linkedin|LinkedIn',
			__( 'Linux' ,'Pixelentity Theme/Plugin')         => 'social-icon-linux|Linux',
			__( 'Pinterest' ,'Pixelentity Theme/Plugin')     => 'social-icon-pinterest-circled|Pinterest',
			__( 'Reddit' ,'Pixelentity Theme/Plugin')        => 'social-icon-reddit|Reddit',
			__( 'Skype' ,'Pixelentity Theme/Plugin')         => 'social-icon-skype|Skype',
			__( 'SoundCloud' ,'Pixelentity Theme/Plugin')    => 'social-icon-soundclowd|SoundCloud',
			__( 'Stackoverflow' ,'Pixelentity Theme/Plugin') => 'social-icon-stackoverflow|Stackoverflow',
			__( 'Steam' ,'Pixelentity Theme/Plugin')         => 'social-icon-steam|Steam',
			__( 'StumbleUpon' ,'Pixelentity Theme/Plugin')   => 'social-icon-stumbleupon|StumbleUpon',
			__( 'Twitter' ,'Pixelentity Theme/Plugin')       => 'social-icon-twitter|Twitter',
			__( 'VKontakte' ,'Pixelentity Theme/Plugin')     => 'social-icon-vkontakte|VKontakte',
			__( 'Windows' ,'Pixelentity Theme/Plugin')       => 'social-icon-windows|Windows',
			__( 'WordPress' ,'Pixelentity Theme/Plugin')     => 'social-icon-wordpress|WordPress',
			__( 'Xing' ,'Pixelentity Theme/Plugin')          => 'social-icon-xing|Xing',
		);
	}

	public function pe_theme_content_get_social_link_filter($html,$link,$tooltip,$icon) {
		return sprintf('<li><a href="%s" target="_blank" title="%s"><i class="%s"></i></a></li>',$link,$tooltip,$icon);
	}

	public function pe_theme_comment_submit_class_filter() {
		return "contour-btn red";
	}

	public function init() {
		parent::init();

		if (PE_THEME_PLUGIN_MODE) {
			return;
		}
		
		if ($this->options->get("retina") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_retina_filter"),10,5);
		} else if ($this->options->get("lazyImages") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_img_filter"),10,4);
		}
	}

	public function pe_theme_custom_post_type() {
		$this->gallery->cpt();
		$this->video->cpt();
		//$this->project->cpt();
		//$this->ptable->cpt();
		//$this->staff->cpt();
		//$this->service->cpt();
		//$this->testimonial->cpt();
		//$this->logo->cpt();
		//$this->slide->cpt();
		//$this->view->cpt();

	}

	public function pe_theme_shortcode_columns_mapping_filter($array) {
			return array(
				'1/1' => 'col-md-12',
				"1/3" => "col-md-4",
				"1/2" => "col-md-6",
				"1/4" => "col-md-3",
				"2/3" => "col-md-8",
				"1/6" => "col-md-2",
				"1/3offset" => "col-md-3 col-md-offset-1",
				"last" => '',
			);
		}

	public function pe_theme_shortcode_columns_options_filter($array) {
		unset($array['2 Column layouts']['5/6 1/6']);
		unset($array['2 Column layouts']['1/6 5/6']);
		unset($array['2 Column layouts']['1/4 3/4']);
		unset($array['2 Column layouts']['3/4 1/4']);
		unset($array['3 Column layouts']['1/4 1/4 2/4']);
		unset($array['3 Column layouts']['2/4 1/4 1/4']);

		$single['Single column layout']['1/1'] = '1/1';

		$array['2 Column layouts']['1/2 1/2offset'] = '1/2 1/2offset';
		$array['3 Column layouts']['1/3 1/3 1/3offset'] = '1/3 1/3 1/3offset';

		$array = 
			array_merge(
						$single,
						$array
						);
		//unset($array['4 Column layouts']);
		//unset($array['6 Column layouts']);

		return $array;
	}

	public function pe_theme_shortcode_columns_container_filter( $template, $content ) {

		return sprintf('<div class="row">%s</div>',$content);

	}


	public function boot() {
		parent::boot();

		
		PeGlobal::$config["content-width"] = 990;
		PeGlobal::$config["post-formats"] = array("video","gallery");
		PeGlobal::$config["post-formats-project"] = array("video","gallery");

		PeGlobal::$config["image-sizes"]["thumbnail"] = array(120,90,true);
		PeGlobal::$config["image-sizes"]["post-thumbnail"] = array(260,200,false);
		

		// blog layouts
		PeGlobal::$config["blog"] = array(
			__("Default",'Pixelentity Theme/Plugin')   => "",
			__("Search",'Pixelentity Theme/Plugin')    => "search",
			__("Alternate",'Pixelentity Theme/Plugin') => "project",
		);

		PeGlobal::$config["shortcodes"] = array(
			'BS_Columns',
			'BS_Video',
		);

		PeGlobal::$config["views"] = 
			array(
				  "LayoutModuleSmartMVPBlog",
				  "LayoutModuleSmartMVPFeatures",
				  "LayoutModuleSmartMVPFeature",
				  "LayoutModuleSmartMVPAction",
				  "LayoutModuleSmartMVPPieChart",
				  "LayoutModuleSmartMVPAreaChart",
				  "LayoutModuleSmartMVPVideo",
				  "LayoutModuleSmartMVPTabs",
				  "LayoutModuleSmartMVPTabLayout1",
				  "LayoutModuleSmartMVPTabLayout2",
				  "LayoutModuleSmartMVPTabLayout3",
				  "LayoutModuleSmartMVPTabLayout4",
				  "LayoutModuleSmartMVPPricingTable",
				  "LayoutModuleSmartMVPPricingTables",
				  "LayoutModuleSmartMVPTestimonial",
				  "LayoutModuleSmartMVPTestimonials",
				  "LayoutModuleSmartMVPTeamMember",
				  "LayoutModuleSmartMVPTeamMembers",
				  "LayoutModuleSmartMVPDownload",
				  "LayoutModuleSmartMVPDownloadFeature",
				  "LayoutModuleSmartMVPFollowUs",
				  "LayoutModuleSmartMVPSignUp",
				  "LayoutModuleSmartMVPColumns",
				  "LayoutModuleSmartMVPText",
		);

		PeGlobal::$config["sidebars"] = array(
			"default" => __("Default post/page",'Pixelentity Theme/Plugin'),
			//"footer" => __("Footer Widgets",'Pixelentity Theme/Plugin'),
		);

		PeGlobal::$config["colors"] = array(
			"color1" => array(
				"label"     => __("Primary Color",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					".lm-failed" => "color",
					".sm-failed" => "color",
					".btn-white" => "color",
					".contact-content a" => "color",
					".post-meta span a" => "color",
					"a" => "color",
					".text-color" => "color",
					".btn-color-ghost" => "color",
					"* .btn-color:hover" => "color",
					".icon-lg:hover" => "color",
					".icon-lg:focus" => "color",
					".icon-sm:hover" => "color",
					".icon-sm:focus" => "color",
					".is-scrolling .navbar-nav>.active>a" => "color",
					".is-scrolling .navbar-nav>.active>a:hover" => "color",
					".is-scrolling .navbar-nav>.active>a:focus" => "color",
					".is-scrolling .navbar-nav>.current-menu-item>a" => "color",
					".is-scrolling .navbar-nav>.current-menu-item>a:hover" => "color",
					".is-scrolling .navbar-nav>.current-menu-item>a:focus" => "color",
					".innernav .navbar-nav>.current-menu-item>a" => "color",
					".innernav .navbar-nav>.current-menu-item>a:hover" => "color",
					".innernav .navbar-nav>.current-menu-item>a:focus" => "color",
					".team-img .img-icons span i:hover" => "color",
					".dark .btn.btn-color:hover" => "color",
					".footer a:hover" => "color",
					".bypostauthor > .comment-body >.comment-content .fn" => "color",

					".btn-white:hover" => "background-color",
					".post-password-form input[type=submit]:hover" => "background-color",
					".post-password-form input[type=submit]:hover" => "background-color",
					".color-bg" => "background-color",
					".btn-color" => "background-color",
					"* .btn-color-ghost:hover" => "background-color",
					".solid-bg" => "background-color",
					".hero-section h1 > span" => "background-color",
					".preloader" => "background-color",
					".pricing-tab .ribbon .popular" => "background-color",
					"* .fast-reg .form-control:focus" => "background-color",
					"#commentform button" => "background-color",

					"* .btn-white:hover" => "border-color",
					".post.sticky h4 a" => "border-color",
					".btn-color-ghost:hover" => "border-color",
					"body .btn-color" => "border-color",
					".btn-color:hover" => "border-color",
					".pricing-tab" => "border-color",
					".pricing-tab h4" => "border-color",
					".signup-divider .form-control:focus" => "border-color",
					".fast-reg .form-control:focus" => "border-color",
					"#commentform button[type]" => "border-color",

				),
				"default" => "#c0392b",
			),
			"color2" => array(
				"label"     => __("Footer/Header background",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					".navbar-fixed-top.is-scrolling" => "background-color:0.95",
					".navbar-fixed-top.innernav" => "background-color:0.95",
					"footer.dark-bg" => "background-color",
				),
				"default" => "#323a45",
			),
		);
		

		PeGlobal::$config['fonts'] = array(
			'fontBody' => array(
				'label'     => __( 'General Font' ,'Pixelentity Theme/Plugin'),
				'selectors' => array(
					'body',
					'h1',
					'h2',
					'h3',
					'h4',
					'.chart-text span',
					'.chart2-text span',
				),
				'default' => 'Open Sans',
			),
			'fontHeadings' => array(
				'label'     => __( 'Secondary Font' ,'Pixelentity Theme/Plugin'),
				'selectors' => array(
					'.text-logo',
					'h5',
					'h6',
					'.btn',
					'.navbar-nav>li>a',
					'.chart-text',
					'.chart2-text',
					'.footer-nav',
					'.dropdown-menu li a',
				),
				'default' => 'Raleway',
			),
			'fontHandwritten' => array(
				'label'     => __( 'Handwritten Font' ,'Pixelentity Theme/Plugin'),
				'selectors' => array(
					'.signup-handwritten',
				),
				'default' => 'Handlee',
			),
		);

		$options = array();

		$galleries = $this->gallery->option();

		$none = array( __("None",'Pixelentity Theme/Plugin') => '-1' );

		$galleries = array_merge( $none, $galleries );

		$options = array_merge( $options, array(
			"import_demo" => $this->defaultOptions["import_demo"],
			"logo" => array(
				"label"       => __("Logo",'Pixelentity Theme/Plugin'),
				"type"        => "Upload",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("This is the main site logo image. The image should be a .png file.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"siteTitle" => array(
				"wpml"        => true,
				"label"       => __("Header Title",'Pixelentity Theme/Plugin'),
				"type"        => "Text",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("Used if logo is left empty.",'Pixelentity Theme/Plugin'),
				"default"     => "SmartMVP",
			),
			"favicon" => array(
				"label"       => __("Favicon",'Pixelentity Theme/Plugin'),
				"type"        => "Upload",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("This is the favicon for your site. The image can be a .jpg, .ico or .png with dimensions of 16x16px ",'Pixelentity Theme/Plugin'),
				"default"     => PE_THEME_URL."/favicon.png",
			),
			"customCSS" => $this->defaultOptions["customCSS"],
			"customJS"  => $this->defaultOptions["customJS"],
			"colors"    => array(
				"label"       => __("Custom Colors",'Pixelentity Theme/Plugin'),
				"type"        => "Help",
				"section"     => __("Colors",'Pixelentity Theme/Plugin'),
				"description" => __("In this page you can set alternative colors for the main colored elements in this theme. One color options has been provided. To change the color used on these elements simply write a new hex color reference number into the fields below or use the color picker which appears when each field obtains focus. Once you have selected your desired colors make sure to save them by clicking the <b>Save All Changes</b> button at the bottom of the page. Then just refresh your page to see the changes.<br/><br/><b>Please Note:</b> Some of the elements in this theme are made from images (Eg. Icons) and these items may have a color. It is not possible to change these elements via this page, instead such elements will need to be changed manually by opening the images/icons in an image editing program and manually changing their colors to match your theme's custom color scheme. <br/><br/>To return all colors to their default values at any time just hit the <b>Restore Default</b> link beneath each field.",'Pixelentity Theme/Plugin'),
			),
			"googleFonts" => array(
				"label"       => __("Custom Fonts",'Pixelentity Theme/Plugin'),
				"type"        => "Help",
				"section"     => __("Fonts",'Pixelentity Theme/Plugin'),
				"description" => __("In this page you can set the typefaces to be used throughout the theme. For each elements listed below you can choose any front from the Google Web Font library. Once you have chosen a font from the list, you will see a preview of this font immediately beneath the list box. The icons on the right hand side of the font preview, indicate what weights are available for that typeface.<br/><br/><strong>R</strong> -- Regular,<br/><strong>B</strong> -- Bold,<br/><strong>I</strong> -- Italics,<br/><strong>BI</strong> -- Bold Italics<br/><br/>When decideing what font to use, ensure that the chosen font contains the font weight required by the element. For example, main headings are bold, so you need to select a new font for these elements which supports a bold font weight. If you select a font which does not have a bold icon, the font will not be applied. <br/><br/>Browse the online <a href='http://www.google.com/webfonts'>Google Font Library</a><br/><br/><b>Custom fonts</b> (Advanced Users):<br/> Other then those available from Google fonts, custom fonts may also be applied to the elements listed below. To do this an additional field is provided below the google fonts list. Here you may enter the details of a font family, size, line-height etc. for a custom font. This information is entered in the form of the shorthand 'font:' CSS declaration, for example:<br/><br/><b>bold italic small-caps 1em/1.5em arial,sans-serif</b><br/><br/>If a font is specified in this field then the font listed in the Google font drop menu above will not be applied to the element in question. If you wish to use the Google font specified in the drop down list and just specify a new font size or line height, you can do so in this field also, however the name of the Google font <b>MUST</b> also be entered into this field. You may need to visit the Google fonts web page to find the exact CSS name for the font you have chosen.",'Pixelentity Theme/Plugin'),
			),
			'footerTitle' => array(
				'wpml'        => true,
				'label'       => __( 'Footer title' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Title displayed above footer text' ,'Pixelentity Theme/Plugin'),
				'default'     => '<a href="#top" class="scrollto" title="SmartMvp"><span class="text-logo">SmartMvp</span></a>',
			),
			'footerHero' => array(
				'wpml'        => true,
				'label'       => __( 'Footer hero' ,'Pixelentity Theme/Plugin'),
				'type'        => 'TextArea',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Text displayed below the title' ,'Pixelentity Theme/Plugin'),
				'default'     => '<strong>600.000</strong> users registered since January.<br>We\'ve created the product that will help your startup get better marketing results.',
			),
			'footerCta' => array(
				'wpml'        => true,
				'label'       => __( 'Footer call to action' ,'Pixelentity Theme/Plugin'),
				'type'        => 'TextArea',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Text displayed below the hero' ,'Pixelentity Theme/Plugin'),
				'default'     => 'What are you waiting for?<a href="#top" class="btn btn-color">Purchase this Design</a>',
			),
			'contactTitle' => array(
				'wpml'        => true,
				'label'       => __( 'Contact title' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Title displayed above contact section' ,'Pixelentity Theme/Plugin'),
				'default'     => 'Our Contact',
			),
			'contactMail' => array(
				'wpml'        => true,
				'label'       => __( 'Contact email' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Email address displayed in the contact section' ,'Pixelentity Theme/Plugin'),
				'default'     => 'hi@themedept.com',
			),
			'contactAddress' => array(
				'wpml'        => true,
				'label'       => __( 'Contact address' ,'Pixelentity Theme/Plugin'),
				'type'        => 'TextArea',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Address displayed in the contact section' ,'Pixelentity Theme/Plugin'),
				'default'     => '121 King Street, Melbourne<br>Victoria 3000 Australia',
			),
			'contactPhone' => array(
				'wpml'        => true,
				'label'       => __( 'Contact phone' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'section'     => __( 'Footer' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Phone number displayed in the contact section' ,'Pixelentity Theme/Plugin'),
				'default'     => '1-234-567-89',
			),
			"footerLinks" => array(
				"label"        => __("Footer Links",'Pixelentity Theme/Plugin'),
				"type"         => "Items",
				"section"      => __("Footer",'Pixelentity Theme/Plugin'),
				"description"  => __("Add one or more links to the footer.",'Pixelentity Theme/Plugin'),
				"button_label" => __("Add Link",'Pixelentity Theme/Plugin'),
				"sortable"     => true,
				"auto"         => 'Link',
				"unique"       => false,
				"editable"     => false,
				"legend"       => false,
				"fields"       => array(
					array(
						"label"   => __("Text",'Pixelentity Theme/Plugin'),
						"name"    => "text",
						"type"    => "text",
						"width"   => 250,
						"default" => 'Link',
					),
					array(
						"name"    => "url",
						"type"    => "text",
						"width"   => 270, 
						"default" => "#",
					),
				),
				"default" => array(
					array(
						'text' => 'About',
						'url'  => '#',
					),
					array(
						'text' => 'Blog',
						'url'  => '#',
					),
					array(
						'text' => 'Help',
						'url'  => '#',
					),
					array(
						'text' => 'Terms',
						'url'  => '#',
					),
					array(
						'text' => 'Privacy',
						'url'  => '#',
					),
				),
			),
			"footerCopyright" => array(
				"label"       => __("Copyright",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "TextArea",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("This is the footer copyright message.",'Pixelentity Theme/Plugin'),
				"default"     => '&copy; 2014 SmartMVP. All rights reserved.',
			),
		));

		foreach( PeGlobal::$const->gmap->metabox["content"] as $key => $value ) {

			PeGlobal::$const->gmap->metabox["content"][ $key ]["section"] = __("Footer",'Pixelentity Theme/Plugin');

		}

		unset( PeGlobal::$const->gmap->metabox["content"]["title"] );
		unset( PeGlobal::$const->gmap->metabox["content"]["description"] );
		
		//$options = array_merge($options, PeGlobal::$const->gmap->metabox["content"]);

		$options = array_merge($options,$this->font->options());
		$options = array_merge($options,$this->color->options());

		//$options["retina"] =& $this->defaultOptions["retina"];
		//$options["lazyImages"] =& $this->defaultOptions["lazyImages"];
		$options["minifyJS"] =& $this->defaultOptions["minifyJS"];
		$options["minifyCSS"] =& $this->defaultOptions["minifyCSS"];

		$options["minifyJS"]['default'] = 'yes';

		$options["adminThumbs"] =& $this->defaultOptions["adminThumbs"];
		if (!empty($this->defaultOptions["mediaQuick"])) {
			$options["mediaQuick"] =& $this->defaultOptions["mediaQuick"];
			$options["mediaQuickDefault"] =& $this->defaultOptions["mediaQuickDefault"];
		}

		$options["adminLogo"] =& $this->defaultOptions["adminLogo"];
		$options["adminUrl"] =& $this->defaultOptions["adminUrl"];

		
		
		PeGlobal::$config["options"] = apply_filters("pe_theme_options",$options);

	}

	public function splash() {

		$splash = array(
			'type'     => 'Conditional',
			'title'    => __( 'Splash' ,'Pixelentity Theme/Plugin'),
			'priority' => 'core',
			'options'  => array(
				'type' => array(
					'none' => array(
						'hide' => 'signup_text,title,subtitle,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2,image,background_image,background_color,background_video,gallery',
					),
					'app' => array(
						'show' => 'title,subtitle,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2,image,background_image,background_color,background_video',
						'hide' => 'signup_text,gallery',
					),
					'dashboard' => array(
						'show' => 'title,subtitle,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2,image,background_image,background_color,background_video',
						'hide' => 'signup_text,gallery',
					),
					'slider' => array(
						'show' => 'gallery',
						'hide' => 'signup_text,title,subtitle,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2,image,background_image,background_color,background_video',
					),
					'standard' => array(
						'show' => 'title,subtitle,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2,background_image,background_color,background_video',
						'hide' => 'signup_text,image,gallery',
					),
					'signup' => array(
						'show' => 'title,subtitle,background_video,background_image,background_color,signup_text',
						'hide' => 'image,gallery,button_text_1,button_url_1,button_target_1,button_color_1,button_icon_1,button_text_2,button_url_2,button_target_2,button_color_2,button_icon_2',
					),
				),
			),
			'where'    => array(
				'post' => 'all',
			),
			'content' => array(
				'type' => array(
					'label'       => __( 'Type' ,'Pixelentity Theme/Plugin'),
					'type'        => 'RadioUI',
					'description' => __( 'Select the type of spash you need' ,'Pixelentity Theme/Plugin'),
					'options'     => array(
						__( 'None' ,'Pixelentity Theme/Plugin')      => 'none',
						__( 'App' ,'Pixelentity Theme/Plugin')       => 'app',
						__( 'Dashboard' ,'Pixelentity Theme/Plugin') => 'dashboard',
						__( 'Slider' ,'Pixelentity Theme/Plugin')    => 'slider',
						__( 'Standard' ,'Pixelentity Theme/Plugin')  => 'standard',
						__( 'Sign Up' ,'Pixelentity Theme/Plugin')   => 'signup',
					),
					'default' => 'none',
				),
				'title' => array(
					'label'       => __( 'Title' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Splash title' ,'Pixelentity Theme/Plugin'),
					'default' => 'Achieve Better Marketing Results with Clean & Beautiful Design',
				),
				'subtitle' => array(
					'label'       => __( 'Subtitle' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Splash subtitle' ,'Pixelentity Theme/Plugin'),
					'default' => 'Your starting point for building successful software products.',
				),
				'signup_text' => array(
					'label'       => __( 'Button text' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Text for the registration button.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => 'Get your Free 30 days trial',
				),
				'button_text_1' => array(
					'label'       => __( 'Button #1 text' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => 'Learn More',
				),
				'button_url_1' => array(
					'label'       => __( 'Button #1 url' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => '#section-about',
				),
				'button_target_1' => array(
					'label'       => __( 'Open in new window' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Should the url be opened in new window?' ,'Pixelentity Theme/Plugin'),
					'options'   => array(
						__( 'Yes' ,'Pixelentity Theme/Plugin') => '_blank',
						__( 'No' ,'Pixelentity Theme/Plugin')  => '_self',
					),
					'default'     => '_self',
				),
				'button_color_1' => array(
					'label'       => __( 'Button #1 design' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Choose between two available button designs' ,'Pixelentity Theme/Plugin'),
					'options'   => array(
						__( 'Filled' ,'Pixelentity Theme/Plugin')      => 'filled',
						__( 'Transparent' ,'Pixelentity Theme/Plugin') => 'transparent',
						__( 'White' ,'Pixelentity Theme/Plugin')       => 'white',
					),
					'default'     => 'transparent',
				),
				'button_icon_1' => array(
					'label'       => __( 'Button #1 icon' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Icon',
					'description' => __( 'Select optional button icon' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'button_text_2' => array(
					'label'       => __( 'Button #2 text' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => 'Play Video',
				),
				'button_url_2' => array(
					'label'       => __( 'Button #2 url' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => 'http://youtu.be/SZEflIVnhH8',
				),
				'button_target_2' => array(
					'label'       => __( 'Open in new window' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Should the url be opened in new window?' ,'Pixelentity Theme/Plugin'),
					'options'   => array(
						__( 'Yes' ,'Pixelentity Theme/Plugin') => '_blank',
						__( 'No' ,'Pixelentity Theme/Plugin')  => '_self',
					),
					'default'     => '_self',
				),
				'button_color_2' => array(
					'label'       => __( 'Button #2 design' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Choose between two available button designs' ,'Pixelentity Theme/Plugin'),
					'options'   => array(
						__( 'Filled' ,'Pixelentity Theme/Plugin')      => 'filled',
						__( 'Transparent' ,'Pixelentity Theme/Plugin') => 'transparent',
						__( 'White' ,'Pixelentity Theme/Plugin')       => 'white',
					),
					'default'     => 'filled',
				),
				'button_icon_2' => array(
					'label'       => __( 'Button #2 icon' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Icon',
					'description' => __( 'Select optional button icon' ,'Pixelentity Theme/Plugin'),
					'default'     => 'icon arrow_triangle-right_alt',
				),
				'image' => array(
					'label'       => __( 'Splash image' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Upload',
					'description' => __( 'Upload image displayed in the splash area' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'background_image' => array(
					'label'       => __( 'Splash background image' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Upload',
					'description' => __( 'Image displayed in the background of the splash area' ,'Pixelentity Theme/Plugin'),
					'default'     => PE_THEME_URL . '/assets/images/hero-placeholder.jpg',
				),
				'background_color' => array(
					'label'       => __( 'Splash background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the splash area' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'background_video' => array(
					'label'       => __( 'Background Video (YT only)' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Previously created video. YouTube only (Vimeo is not supported).' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'gallery' => array(
					'label'       => __( 'Gallery' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Gallery used for splash area. Captions can be added on the gallery edit screen.' ,'Pixelentity Theme/Plugin'),
					'options'     => $this->gallery->option(),
					'default'     => '',
				),
			),
		);

		$videos = $this->video->option();

		if ( is_array( $videos ) ) :

			foreach ( $videos as $video => $postid ) {

				$meta = get_post_meta( $postid, 'pe_theme_meta', true );

				if ( '' !== $meta ) {

					if ( $meta->video->type === 'vimeo' )
						unset( $videos[ $video ] );

				}

			}

			$videos = array_merge( array( __( 'Don\'t use video background' ,'Pixelentity Theme/Plugin') => -1 ), $videos );

		endif;

		if ( ! is_array( $videos ) ) {

			$videos = array( __("No videos defined",'Pixelentity Theme/Plugin') => -1 );

		}

		$splash['content']['background_video']['options'] = $videos;

		return $splash;
	}


	public function pe_theme_metabox_config_video() {
		unset( PeGlobal::$config["metaboxes-video"]['video']['content']['fullscreen'] );
		unset( PeGlobal::$config["metaboxes-video"]['video']['content']['width'] );
	}

	public function pe_theme_metabox_config_post() {
		parent::pe_theme_metabox_config_post();

		unset( PeGlobal::$config["metaboxes-post"]['gallery']['content']['type'] );

	}

	public function pe_theme_metabox_config_page() {
		parent::pe_theme_metabox_config_page();

		$builder = isset(PeGlobal::$config["metaboxes-page"]["builder"]) ? PeGlobal::$config["metaboxes-page"]["builder"] : false;
		$builder = $builder ? array("builder"=> $builder) : array();

		if (PE_THEME_MODE && $builder) {
			// top level builder element can only member of the "section" group
			$builder["builder"]["content"]["builder"]["allowed"] = "section";
		}

		PeGlobal::$config["metaboxes-page"] = array_merge(
			$builder,
			array(
				'splash'  => $this->splash(),
			)
		);		
	}

	public function pe_theme_metabox_config_project() {
		parent::pe_theme_metabox_config_project();

		$galleryMbox = array(
			"title"    => __("Slider",'Pixelentity Theme/Plugin'),
			"type"     => "GalleryPost",
			"priority" => "core",
			"where"    => array(
				"post" => "gallery"
			),
			"content" => array(
				"id" => PeGlobal::$const->gallery->id,
			),
		);

		PeGlobal::$config["metaboxes-project"] =  array(
			"gallery"   => $galleryMbox,
			"video"     => PeGlobal::$const->video->metaboxPost,
		);

	}

	public function pe_theme_smartmvp_testimonial_supports() {

		//add_post_type_support( 'service', 'thumbnail' );
		//add_post_type_support( 'testimonial', 'thumbnail' );

	}

	public function pe_theme_smartmvp_metabox_config_project() {

		unset( PeGlobal::$config["metaboxes-project"]['portfolio'] );
		unset( PeGlobal::$config["metaboxes-project"]['info'] );

	}

	public function pe_theme_metabox_config_staff_action() {

		

	}

	public function pe_theme_metabox_config_service_action() {

		

	}

	public function pe_theme_gallery_image_fields_filter( $fields ) {

		$save = $fields['save'];
		$ititle = $fields['ititle'];

		unset( $fields['video'] );
		unset( $fields['link'] );
		unset( $fields['save'] );
		unset( $fields['ititle'] );
		unset( $fields['caption'] );

		$fields = array(
			'title' => array(
				'label'       => __( 'Title' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'description' => __( 'Splash title' ,'Pixelentity Theme/Plugin'),
				'default' => '',
				'section'     => 'main',
			),
			'subtitle' => array(
				'label'       => __( 'Subtitle' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'description' => __( 'Splash subtitle' ,'Pixelentity Theme/Plugin'),
				'default' => '',
				'section'     => 'main',
			),
			'button_text_1' => array(
				'label'       => __( 'Button #1 text' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'default'     => '',
				'section'     => 'main',
			),
			'button_url_1' => array(
				'label'       => __( 'Button #1 url' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'default'     => '',
				'section'     => 'main',
			),
			'button_target_1' => array(
				'label'       => __( 'Open in new window' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Select',
				'description' => __( 'Should the url be opened in new window?' ,'Pixelentity Theme/Plugin'),
				'options'   => array(
					__( 'Yes' ,'Pixelentity Theme/Plugin') => '_blank',
					__( 'No' ,'Pixelentity Theme/Plugin')  => '_self',
				),
				'default'     => '_self',
				'section'     => 'main',
			),
			'button_color_1' => array(
				'label'       => __( 'Button #1 design' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Select',
				'description' => __( 'Choose between two available button designs' ,'Pixelentity Theme/Plugin'),
				'options'   => array(
					__( 'Filled' ,'Pixelentity Theme/Plugin')      => 'filled',
					__( 'Transparent' ,'Pixelentity Theme/Plugin') => 'transparent',
				),
				'default'     => 'transparent',
				'section'     => 'main',
			),
			'button_text_2' => array(
				'label'       => __( 'Button #2 text' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'default'     => '',
				'section'     => 'main',
			),
			'button_url_2' => array(
				'label'       => __( 'Button #2 url' ,'Pixelentity Theme/Plugin'),
				'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Text',
				'default'     => '',
				'section'     => 'main',
			),
			'button_target_2' => array(
				'label'       => __( 'Open in new window' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Select',
				'description' => __( 'Should the url be opened in new window?' ,'Pixelentity Theme/Plugin'),
				'options'   => array(
					__( 'Yes' ,'Pixelentity Theme/Plugin') => '_blank',
					__( 'No' ,'Pixelentity Theme/Plugin')  => '_self',
				),
				'default'     => '_self',
				'section'     => 'main',
			),
			'button_color_2' => array(
				'label'       => __( 'Button #2 design' ,'Pixelentity Theme/Plugin'),
				'type'        => 'Select',
				'description' => __( 'Choose between two available button designs' ,'Pixelentity Theme/Plugin'),
				'options'   => array(
					__( 'Filled' ,'Pixelentity Theme/Plugin')      => 'filled',
					__( 'Transparent' ,'Pixelentity Theme/Plugin') => 'transparent',
				),
				'default'     => 'transparent',
				'section'     => 'main',
			),
		);

		$fields['save'] = $save;

		return $fields;

	}

	public function pe_signup_form_submit() {

		// Verify nonce
		$nonce_check = check_ajax_referer( 'pe_signup_form', 'pe_nonce', false );

		if ( ! $nonce_check ) {

			$return = array(
				'msg'     => __( 'Something went wrong, please try again.' ,'Pixelentity Theme/Plugin'),
				'success' => false,
			);

			wp_send_json( $return );

		}

		// Check all the required fields are here
		$username = isset( $_POST['pe_user'] ) ? sanitize_user( $_POST['pe_user'] ) : '';

		if ( empty( $username ) ) {

			$return = array(
				'msg'     => __( 'Username you entered is not valid.' ,'Pixelentity Theme/Plugin'),
				'success' => false,
			);

			wp_send_json( $return );

		}

		$email = isset( $_POST['pe_mail'] ) ? $_POST['pe_mail'] : '';

		if ( ! is_email( $email ) ) {

			$return = array(
				'msg'     => __( 'Email you entered is not valid.' ,'Pixelentity Theme/Plugin'),
				'success' => false,
			);

			wp_send_json( $return );

		}

		// All is fine, proceed with the signup
		if ( defined( 'PE_THEME_DEMO_SITE' ) && PE_THEME_DEMO_SITE ) {

			$return = array(
				'msg'     => __( 'Registration is disabled in the demo.' ,'Pixelentity Theme/Plugin'),
				'success' => false,
			);

			wp_send_json( $return );

		} 		

		$password = wp_generate_password();

		$userdata = array(
			'user_login' => $username,
			'user_email' => $email,
			'user_pass'  => $password,
		);

		$user_id = wp_insert_user( $userdata );

		if ( is_wp_error( $user_id ) ) {

			$return = array(
				'msg'     => $user_id->get_error_message(),
				'success' => false,
			);

			wp_send_json( $return );

		}

		// Registration went fine
		wp_new_user_notification( $user_id, $password );

		$return = array(
			'msg'     => __( 'Registration completed. The password will be sent to your email.' ,'Pixelentity Theme/Plugin'),
			'success' => true,
		);

		wp_send_json( $return );

	}

	protected function init_asset() {
		return new PeThemeSmartMVPAsset($this);
	}

	protected function init_template() {
		return new PeThemeSmartMVPTemplate($this);
	}

}