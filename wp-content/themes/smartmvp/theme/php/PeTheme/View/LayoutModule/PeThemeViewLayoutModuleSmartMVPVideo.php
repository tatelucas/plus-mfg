<?php

class PeThemeViewLayoutModuleSmartMVPVideo extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Video' ,'Pixelentity Theme/Plugin')
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
				'content' => 
				array(
					  'label'       => 'Content',
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => '<h4>Fully Responsive Layout that will adapt itself to any mobile device.</h4><p>Praesentium voluptatem excepturi corporis labore architecto eos ea molestiae saepe facere at voluptate similique iusto porro pariatur, dolorum dolor magni sint eveniet iste. Eaque, aliquam, dignissimos.</p><p><a href="#section-download" class="scrollto"><strong>Download the App for your smartphone &#155;</strong></a></p>'
					  ),
				'image' => 
				array(
					  'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Upload',
					  'description' => __( 'Section Image.' ,'Pixelentity Theme/Plugin'),
					  'default'     => '',
					  ),
				'video' => 
				array(
					  'label'       => __( 'YouTube Video' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'YouTube Video url.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => 'http://youtu.be/SZEflIVnhH8',
					  ),
				'bgcolor' => array(
					'label'       => __( 'Background color' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Color',
					'description' => __( 'Background color of the section.' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
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
		return __( 'Video' ,'Pixelentity Theme/Plugin');
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
		peTheme()->get_template_part( 'viewmodule', 'video' );
	}

	public function tooltip() {
		return __( 'Use this block to add a Video section.' ,'Pixelentity Theme/Plugin');
	}

}

?>