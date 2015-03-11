<?php

class PeThemeViewLayoutModuleSmartMVPTestimonial extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Testimonial' ,'Pixelentity Theme/Plugin')
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
						'default'     => 'James Knight',
						),
				  'role' => 
				  array(
						'label'       => __( 'Role' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Text',
						'description' => __( 'Role.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Manager @ LoremIpsum',
						),
				  'content' => 
				  array(
						'label'       => 'Content',
						'type'        => 'Editor',
						'noscript'    => true,
						'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
						'default'     => 'Iusto quam fugit consequatur explicabo at deserunt eius vel, debitis non itaque blanditiis error iure modi, asperiores molestiae dolorum! Earum expedita sit, nesciunt neque magnam at dolorem praesentium saepe! Rerum recusandae qui quidem, a neque consequatur laboriosam.'
						),
				  'image' => 
				  array(
						'label'       => __( 'Image' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Upload',
						'description' => __( 'Image.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),
				  'logo' => 
				  array(
						'label'       => __( 'Logo' ,'Pixelentity Theme/Plugin'),
						'type'        => 'Upload',
						'description' => __( 'Logo.' ,'Pixelentity Theme/Plugin'),
						'default'     => '',
						),
			);
		
	}

	public function name() {
		return __( 'Testimonial' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'testimonials';
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __( 'Use this block to add a new testimonial.' ,'Pixelentity Theme/Plugin');
	}

}

?>
