<?php

class PeThemeViewLayoutModuleSmartMVPFeature extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Feature' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				  'title' => 
				  array(
						'label'       => __( 'Name' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Name of this feature.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Responsive Layout',
						),
				  
				  'icon' => 
				  array(
						'label'       => __( 'Icon' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Icon',
						'description' => __( 'Icon.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'icon-mobile',
						),
				  'link' => 
				  array(
						'label'       => __( 'Icon link' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Optional link which will be added to the icon.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),				  
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => ''
						),
			);
		
	}

	public function name() {
		return __( 'Feature' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'features';
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __( 'Use this block to add a new feature.' ,'Pixelentity Theme/Plugin');
	}

}

?>
