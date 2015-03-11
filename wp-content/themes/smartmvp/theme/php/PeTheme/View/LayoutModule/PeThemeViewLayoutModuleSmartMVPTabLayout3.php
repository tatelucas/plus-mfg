<?php

class PeThemeViewLayoutModuleSmartMVPTabLayout3 extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Tab' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				  'title' => 
				  array(
						'label'       => __( 'Tab Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Tab Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Support Forum <br>Access',
						),
				  'icon' => 
				  array(
						'label'       => __( 'Icon' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Icon',
						'description' => __( 'Icon.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'icon-chat',
						),
				  'stitle' => 
				  array(
						'label'       => __( 'Section Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Section Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'SmartMvp is a startup landing page with usable, versatile and modular features.',
						),
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => ''
						),
				  "list" => 
				  array(
						"label"=> __("Icons",'Pixelentity Theme/Plugin'),
						"description" => __("Add one or more icons",'Pixelentity Theme/Plugin'),
						"type"=>"Items",
						"description" => "",
						"button_label" => __("Add New Icon",'Pixelentity Theme/Plugin'),
						"sortable" => true,
						"auto" => 'icon-adjustments',
						"unique" => false,
						"editable" => false,
						"legend" => false,
						"fields" => 
						array(
							  array(
									"type" => "empty",
									"width" => "186"
									),
							  array(
									"name" => "icon",
									"type" => "icon",
									"width" => "100",
									"default" => "icon-adjustments"
									),
							  array(
									"name" => "title",
									"type" => "text",
									"width" => "200",
									"default" => "Numerous Colour Schemes"
									),
							  array(
									"name" => "content",
									"type" => "text",
									"width" => "600",
									"default" => "Similique eaque esse praesentium laudantium deserunt quos incidunt sed porro maiores dolore voluptate quod quisquam."
									),
							  ),
						"default" => 
						array(
							  array(
									"icon"=>'icon-adjustments',
									"title"=>'Numerous Colour Schemes',
									"content"=>'Similique eaque esse praesentium laudantium deserunt quos incidunt sed porro maiores dolore voluptate quod quisquam.'
									),
							  )
						),
				  'image' => 
				  array(
						'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Upload',
						'description' => __( 'Section Image.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),
			);
		
	}

	public function name() {
		return __( 'Layout 3' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'tabs';
	}

	public function setTemplateData() {
		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content = empty( $this->data->content ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content ) );
		peTheme()->template->data($this->data,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'tab-layout3' );
	}

	public function tooltip() {
		return __( 'Text with icons and a big image (right).' ,'Pixelentity Theme/Plugin');
	}

}

?>