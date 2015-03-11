<?php

class PeThemeViewLayoutModuleSmartMVPBlog extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Blog' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		$fields = peTheme()->data->customPostTypeMbox( 'post' );
		$fields = $fields['content'];

		$fields = array_merge(
			array(
				'name' => array(
					'label'       => __( 'Link Name' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Used when linking to the section in a page (eg, from the menu).' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'bgcolor' => array(
					'label'       => __( 'Background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '#fff',
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
			),
			$fields
		);

		return $fields;
	}

	public function name() {
		return __( 'Blog' ,'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __( 'Section' ,'Pixelentity Theme/Plugin');
	}

	public function templateName() {
		return 'blog';
	}

	public function group() {
		return 'section';
	}


	public function setTemplateData() {
		// we don't store template data here because we want to avoid it if the custom loop is empty
		// so we'll do it in render();
	}

	public function template() {
		$t =& peTheme();
		if ( $loop = $t->data->customLoop( $this->data ) ) {
			$t->template->data( $this->data, $this->conf->bid );
			$t->get_template_part( 'viewmodule', $this->templateName() );
			$t->content->resetLoop();
		}
	}

	public function tooltip() {
		return __( 'Add a Blog section showing posts.' ,'Pixelentity Theme/Plugin');
	}

}

?>