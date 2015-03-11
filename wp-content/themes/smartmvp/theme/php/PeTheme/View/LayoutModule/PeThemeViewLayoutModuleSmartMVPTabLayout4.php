<?php

class PeThemeViewLayoutModuleSmartMVPTabLayout4 extends PeThemeViewLayoutModule {

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
						'default'     => 'Designed for <br>Startups',
						),
				  'icon' => 
				  array(
						'label'       => __( 'Icon' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Icon',
						'description' => __( 'Icon.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'icon-lightbulb',
						),
				  'ctitle1' => 
				  array(
						'label'       => __( 'Column Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Column Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Publish your Startup in Beautiful Way.',
						),
				  'content1' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Column content.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Similique eaque esse praesentium laudantium deserunt quos incidunt sed porro maiores dolore voluptate quod quisquam, architecto eos dicta quae magni vero unde necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing.'
						),
				  'ctitle2' => 
				  array(
						'label'       => __( 'Column Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Column Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Take a Second and Explore it!.',
						),
				  'content2' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Column content.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Similique eaque esse praesentium laudantium deserunt quos incidunt sed porro maiores dolore voluptate quod quisquam, architecto eos dicta quae magni vero unde necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing.'
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
		return __( 'Layout 4' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'tabs';
	}

	public function setTemplateData() {
		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content1 = empty( $this->data->content1 ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content1 ) );
		$this->data->content2 = empty( $this->data->content2 ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content2 ) );
		peTheme()->template->data($this->data,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'tab-layout4' );
	}

	public function tooltip() {
		return __( '2 Columns text with a big image (bottom).' ,'Pixelentity Theme/Plugin');
	}

}

?>