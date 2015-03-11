<?php

class PeThemeViewLayoutModuleSmartMVPPricingTables extends PeThemeViewLayoutModuleContainer {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Pricing Tables' ,'Pixelentity Theme/Plugin')
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
					  'description' => __( 'Section title..' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Get Started Today',
					  ),
				'subtitle' => 
				array(
					  'label'       => 'Subtitle',
					  'type'        => 'Text',
					  'description' => __( 'Section subtitle.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Choose the plan that suits you best. 30 Days Free Trial with all plans.'
					  ),
				'content' => 
				array(
					  'label'       => 'Content',
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => '<strong>Looking for more?</strong> &mdash; Tell us what you need. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt nesciunt sed molestiae quos, dolor eaque quis facilis tempora consequuntur doloribus omnis cumque fugiat. Qui rerum quis mollitia incidunt reprehenderit expedita, non cumque tenetur deleniti! <strong> <a href="#">Contact us <i class="icon arrow_carrot-right_alt2"></i></a></strong>'
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
			);
	}

	public function name() {
		return __( 'Pricing Tables' ,'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __( 'Section' ,'Pixelentity Theme/Plugin');
	}

	public function create() {
		return 'SmartMVPPricingTable';
	}

	public function force() {
		return 'SmartMVPPricingTable';
	}
	
	public function allowed() {
		return 'pricingtable';
	}

	public function group() {
		return 'section';
	}

	public function setTemplateData() {
		// override setTemplateData so to also pass the item array to the template file
		// this way the markup for the child blocks can also be generated in the container/parent template
		// We're not interested in builder related settings so we rebuild the array
		// to only include the data we going to use.
		
		$items = array();
		if ( ! empty( $this->conf->items ) ) {
			foreach( $this->conf->items as $item ) {
				$item = (object) shortcode_atts(
												array(
													  'plan'        => '',
													  'price'       => '',
													  'ribbon'       => '',
													  'button_text'       => '',
													  'button_url'       => '',
													  'features'    => array(),
													  ),
												$item['data']
												);
				
				$items[] = $item;
			}
		}

		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content = empty( $this->data->content ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content ) );
		$this->data->subtitle = empty( $this->data->subtitle ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->subtitle ) );
		peTheme()->template->data( $this->data, $items, $this->conf->bid );
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', empty( $this->data->layout ) ? 'pricingtables' : $this->data->layout );
	}

	public function tooltip() {
		return __( 'Use this block to add a Pricing section.' ,'Pixelentity Theme/Plugin');
	}

}

?>