<?php

class PeThemeViewLayoutModuleLargeBanner extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Large Banner' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				'title' => array(
					'label'       => 'Title',
					'type'        => 'Text',
					'description' => __( 'Content' ,'Pixelentity Theme/Plugin'),
					'default'     => ''
				),
				'content' => array(
					'label'       => 'Content',
					'type'        => 'TextArea',
					'description' => __( 'Content' ,'Pixelentity Theme/Plugin'),
					'default'     => ''
				),
				'button_text' => array(
					'label'       => __( 'Button text' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => '',
				),
				'button_url' => array(
					'label'       => __( 'Button url' ,'Pixelentity Theme/Plugin'),
					'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'default'     => '',
				),
				'button_target' => array(
					'label'       => __( 'Open in new window' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Select',
					'description' => __( 'Should the url be opened in new window?' ,'Pixelentity Theme/Plugin'),
					'options'   => array(
						__( 'Yes' ,'Pixelentity Theme/Plugin') => 'yes',
						__( 'No' ,'Pixelentity Theme/Plugin')  => 'no',
					),
					'default'     => 'no',
				),
			);
	}

	public function name() {
		return __( 'Large Banner' ,'Pixelentity Theme/Plugin');
	}

	public function setTemplateData() {
		$t =& peTheme();
		peTheme()->template->data( $this->data, $this->conf->bid );
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'large-banner' );
	}

	public function tooltip() {
		return __( 'Add a Large banner section.' ,'Pixelentity Theme/Plugin');
	}

}