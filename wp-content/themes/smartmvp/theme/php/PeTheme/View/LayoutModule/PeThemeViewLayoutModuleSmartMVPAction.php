<?php

class PeThemeViewLayoutModuleSmartMVPAction extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Action' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				'name' => 
				array(
					  'label'       => __( 'Link Name' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'description' => __( 'Used when linking to the section in a page (eg, from the menu).' ,'Pixelentity Theme/Plugin'),
					  'default'     => '',
					  ),
				'title' => 
				array(
					  'label'       => __( 'Title' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'description' => __( 'Section title.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Validate your Business Idea and Reach Product Market Fit',
					  ),
				'content' => 
				array(
					  'label'       => 'Content',
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere veritatis inventore eum, cupiditate esse debitis consectetur nisi harum. Tempore, assumenda ducimus vero totam labore. Ipsam, eos odit eaque, voluptatum minima, odio eveniet soluta saepe, culpa quo enim omnis iusto. Possimus, at numquam beatae non atque?'
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
					'default'     => '#section-features',
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
					'default'     => 'Try it for Free',
				),
				'button_url_2' => array(
					'label'       => __( 'Button #2 url' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => '#section-signup',
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
					),
					'default'     => 'filled',
				),
				'button_icon_2' => array(
					'label'       => __( 'Button #2 icon' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Icon',
					'description' => __( 'Select optional button icon' ,'Pixelentity Theme/Plugin'),
					'default'     => 'icon arrow_carrot-2dwnn_alt',
				),
				'image' => array(
					'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Upload',
					'description' => __( 'Section Image.' ,'Pixelentity Theme/Plugin'),
					'default'     => PE_THEME_URL . '/assets/images/img-right.jpg',
				),
				'bgcolor' => array(
					'label'       => __( 'Background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '#FAFAFA',
				),
				'bgimage' => array(
					'label'       => __( 'Background image' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Upload',
					'description' => __( 'Background image of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'typography' => array(
					'label'       => __( 'Typography color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'RadioUI',
					'description' => __( 'Choose between light and dark type. You will want to adjust this based on your background and overlay.' ,'Pixelentity Theme/Plugin'),
					'options'     => array(
						__( 'Dark' ,'Pixelentity Theme/Plugin')   => 'dark',
						__( 'Light' ,'Pixelentity Theme/Plugin')  => 'light',
					),
					'default'     => 'dark',
				),
				
			);
	}

	public function name() {
		return __( 'Action' ,'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __( 'Section' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'section';
	}

	public function setTemplateData() {
		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content = empty( $this->data->content ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content ) );
		peTheme()->template->data($this->data,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'action' );
	}

	public function tooltip() {
		return __( 'Use this block to add an Action section.' ,'Pixelentity Theme/Plugin');
	}

}

?>