<?php

class PeThemeViewLayoutModuleSmartMVPDownload extends PeThemeViewLayoutModuleContainer {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Download' ,'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				'name' => array(
					'label'       => __( 'Link Name' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Used when linking to the section in a page (eg, from the menu).' ,'Pixelentity Theme/Plugin'),
					'default'     => '',
				),
				'title' => array(
					'label'       => __( 'Title' ,'Pixelentity Theme/Plugin'),
					'type'        => 'Text',
					'description' => __( 'Section title..' ,'Pixelentity Theme/Plugin'),
					'default'     => 'Download the App',
				),
				'subtitle' => 
				array(
					  'label'       => 'Subtitle',
					  'type'        => 'Text',
					  'description' => __( 'Section subtitle.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Don\'t miss the chance to get our amazing Mobile Application. Get connected anytime.'
					  ),
				'ctitle' => 
				array(
					  'label'       => 'Content Title',
					  'type'        => 'Text',
					  'description' => __( 'Content subtitle.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Supercharge your Productivity'
					  ),
				'content' => 
				array(
					  'label'       => 'Content',
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'With an online dashboard and a mobile app, you\'ll have full control of your account and see your usage in real-time.<span class="text-color">Even more convenient!</span>'
					  ),
				'button_text' => 
				array(
					  'label'       => __( 'Button text' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Text for optional button. Leave empty to not use the button.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => 'Download Now!!',
					  ),
				'button_url' => 
				array(
					  'label'       => __( 'Button url' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Url button will link to.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => '#',
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
		return __( 'Download' ,'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __( 'Section' ,'Pixelentity Theme/Plugin');
	}

	public function create() {
		return 'SmartMVPDownloadFeature';
	}

	public function force() {
		return 'SmartMVPDownloadFeature';
	}
	
	public function allowed() {
		return 'download';
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
													  'name'    => '',
													  'image'    => '',
													  'content'    => '',
													  ),
												$item['data']
												);

				$item->content = empty( $item->content ) ? '' : do_shortcode(apply_filters( 'the_content', $item->content ) );
				$items[] = $item;
			}
		}

		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content = empty( $this->data->content ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content ) );
		$this->data->subtitle = empty( $this->data->subtitle ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->subtitle ) );

		peTheme()->template->data( $this->data, $items, $this->conf->bid );
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'download' );
	}

	public function tooltip() {
		return __( 'Use this block to add a Download section.' ,'Pixelentity Theme/Plugin');
	}

}

?>