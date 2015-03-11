<?php

class PeThemeViewLayoutModuleSmartMVPPricingTable extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Pricing Table' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				'plan' => array(
					'label'       => __( 'Plan' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Pricing plan title.' ,'Pixelentity Theme/Plugin'),
					'default'     => __( 'Web Page' ,'Pixelentity Theme/Plugin'),
				),
				'price' => array(
					'label'       => __( 'Price' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Plan price.' ,'Pixelentity Theme/Plugin'),
					'default'     => '$19<span>/mo</span>',
				),
				'ribbon' => array(
								 'label'       => __( 'Ribbon' ,'Pixelentity Theme/Plugin'),
								 'type'        => 'Text',
								 'description' => __( 'Optional ribbon text, like "popular" (leave empty for none).' ,'Pixelentity Theme/Plugin'),
								 'default'     => '',
								 ),
				'features' => 
				array(
					  'label'        => __( 'Features' ,'Pixelentity Theme/Plugin'),
					  'type'         => 'Items',
					  'description'  => __( 'Add one or more feature describing this plan.' ,'Pixelentity Theme/Plugin'),
					  'button_label' => __( 'Add Feature' ,'Pixelentity Theme/Plugin'),
					  'sortable'     => true,
					  'auto'         => __( '1 user' ,'Pixelentity Theme/Plugin'),
					  'unique'       => false,
					  'editable'     => false,
					  'legend'       => false,
					  'fields'       => 
					  array(
							array(
								  'label'   => 'Text',
								  'name'    => 'text',
								  'type'    => 'text',
								  'width'   => 500, 
								  'default' => __( '1 user' ,'Pixelentity Theme/Plugin'),
								  ),
							),
					  ),
				'button_text' => 
				array(
					  'label'       => __( 'Button text' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => 'Subscribe',
					  ),
				'button_url' => 
				array(
					  'label'       => __( 'Button url' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => '',
					  ),
			);
		
	}

	public function name() {
		return __( 'Pricing Table' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'pricingtable';
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __( 'Use this block to add a new pricing table.' ,'Pixelentity Theme/Plugin');
	}

}

?>