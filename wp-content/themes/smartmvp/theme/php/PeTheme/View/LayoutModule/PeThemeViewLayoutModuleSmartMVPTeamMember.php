<?php

class PeThemeViewLayoutModuleSmartMVPTeamMember extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Member' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				  'name' => 
				  array(
						'label'       => __( 'Name' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Name.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Lukas Mayr',
						),
				  'image' => 
				  array(
						'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Upload',
						'description' => __( 'Image.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),				  
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => '<span class="text-color">Lead designer</span> with experience in most things visual. He loves trying out new techniques and finding the perfect solution for any kind of requirements.'
						),
				  'icons' => 
				  array(
						'label'        => __( 'Social links' ,'Pixelentity Theme/Plugin'),
						'type'         => 'Items',
						'description'  => __( 'Add one or more icon.' ,'Pixelentity Theme/Plugin'),
						'button_label' => __( 'Add Social Link' ,'Pixelentity Theme/Plugin'),
						'sortable'     => true,
						'auto'         => 'icon-facebook',
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
									'default' => 'icon-facebook',
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
			);
		
	}

	public function name() {
		return __( 'TeamMember' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'team';
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __( 'Use this block to add a new team member.' ,'Pixelentity Theme/Plugin');
	}

}

?>
