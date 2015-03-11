<?php

class PeThemeViewLayoutModuleSmartMVPSignUp extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Sign Up' ,'Pixelentity Theme/Plugin')
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
					  'default'     => 'Start your free, no-risk, 30 day trial!',
					  ),
				'subtitle' => 
				array(
					  'label'       => __( 'Subtitle' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'description' => __( 'Section subtitle.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'No credit card required. Upgrade, downgrade, or cancel anytime.',
					  ),
				'button_text' => 
				array(
					  'label'       => __( 'Button text' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'description' => __( 'Text displayed inside a button.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Join Today',
					  ),
				'handwritten' => 
				array(
					  'label'       => __( 'Handwritten text' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'description' => __( 'Displayed next to a button.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Why wait? Start now! <br>No credit card needed',
					  ),
				'canvas_bg' => array(
					'label'       => __( 'Canvas background' ,'Pixelentity Theme/Plugin'),
					'type'        => 'RadioUI',
					'description' => __( 'Choose if section should use animated canvas background.' ,'Pixelentity Theme/Plugin'),
					'options'     => array(
						__( 'Yes' ,'Pixelentity Theme/Plugin')   => 'yes',
						__( 'No' ,'Pixelentity Theme/Plugin')    => 'no',
					),
					'default'     => 'yes',
				),
				'canvas_highlight' => array(
					'label'       => __( 'Canvas highlight' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Highlight color of he animation.' ,'Pixelentity Theme/Plugin'),
					'default'     => '#fff',
				),
				'bgcolor' => array(
					'label'       => __( 'Background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '#353e4a',
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
		return __( 'Sign Up' ,'Pixelentity Theme/Plugin');
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
		peTheme()->get_template_part( 'viewmodule', 'signup' );
	}

	public function tooltip() {
		return __( 'Use this block to add a Follow Us section.' ,'Pixelentity Theme/Plugin');
	}

}

?>