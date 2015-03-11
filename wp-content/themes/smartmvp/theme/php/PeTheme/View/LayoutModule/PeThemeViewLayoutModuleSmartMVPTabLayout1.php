<?php

class PeThemeViewLayoutModuleSmartMVPTabLayout1 extends PeThemeViewLayoutModule {

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
						'default'     => 'Flexible User<br>Interface',
						),
				  'icon' => 
				  array(
						'label'       => __( 'Icon' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Icon',
						'description' => __( 'Icon.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'icon-layers',
						),
				  'stitle' => 
				  array(
						'label'       => __( 'Section Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Section Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'SmartMvp is a high-quality solution for those who want a beautiful website in no time.',
						),
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => ''
						),
				  'button1_text' => 
				  array(
						'label'       => __( 'Button 1 text' ,'Pixelentity Theme/Plugin'),
						'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'default'     => 'Our Clients',
						),
				  'button1_url' => 
				  array(
						'label'       => __( 'Button 1 url' ,'Pixelentity Theme/Plugin'),
						'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'default'     => '',
						),
				  'button2_text' => 
				  array(
						'label'       => __( 'Button 2 text' ,'Pixelentity Theme/Plugin'),
						'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'default'     => 'Meet the Team',
						),
				  'button2_url' => 
				  array(
						'label'       => __( 'Button 2 url' ,'Pixelentity Theme/Plugin'),
						'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'default'     => '',
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
		return __( 'Layout 1' ,'Pixelentity Theme/Plugin');
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
		peTheme()->get_template_part( 'viewmodule', 'tab-layout1' );
	}

	public function tooltip() {
		return __( 'Text with buttons and a big image (right).' ,'Pixelentity Theme/Plugin');
	}

}

?>