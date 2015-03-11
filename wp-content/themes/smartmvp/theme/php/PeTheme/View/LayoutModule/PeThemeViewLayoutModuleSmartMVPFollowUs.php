<?php

class PeThemeViewLayoutModuleSmartMVPFollowUs extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Follow Us' ,'Pixelentity Theme/Plugin')
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
					  'default'     => 'Follow Us',
					  ),
				'icons' => 
				array(
					  'label'        => __( 'Social links' ,'Pixelentity Theme/Plugin'),
					  'type'         => 'Items',
					  'description'  => __( 'Add one or more icon.' ,'Pixelentity Theme/Plugin'),
					  'button_label' => __( 'Add Icon' ,'Pixelentity Theme/Plugin'),
					  'sortable'     => true,
					  'auto'         => '#',
					  'unique'       => false,
					  'editable'     => false,
					  'legend'       => false,
					  'fields'       => 
					  array(
							array(
								  'label'   => __( 'Icon' ,'Pixelentity Theme/Plugin'),
								  'name'    => 'icon',
								  'type'    => 'icon',
								  'width'   => 80, 
								  'default' => '',
								  ),
							array(
								  'label'   => __( 'Url' ,'Pixelentity Theme/Plugin'),
								  'name'    => 'url',
								  'type'    => 'text',
								  'width'   => 500, 
								  'default' => '#',
								  ),
							),
					  ),
				'content' => 
				array(
					  'label'       => __( 'Content' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => ''
					  ),
				'bgcolor' => array(
					'label'       => __( 'Background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '#C0392B',
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
		return __( 'Follow Us' ,'Pixelentity Theme/Plugin');
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
		peTheme()->get_template_part( 'viewmodule', 'followus' );
	}

	public function tooltip() {
		return __( 'Use this block to add a Follow Us section.' ,'Pixelentity Theme/Plugin');
	}

}

?>