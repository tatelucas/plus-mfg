<?php

class PeThemeViewLayoutModuleSmartMVPDownloadFeature extends PeThemeViewLayoutModuleText {

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
				  'name' => 
				  array(
						'label'       => __( 'Title' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Title.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Get Notified',
						),
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam inventore.'
						),
				  'image' => 
				  array(
						'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Upload',
						'description' => __( 'Image.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),				  
				  
				  
			);
		
	}

	public function name() {
		return __( 'TeamMember' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'download';
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __( 'Use this block to add a new feature/image.' ,'Pixelentity Theme/Plugin');
	}

}

?>
