<?php

class PeThemeViewLayoutModuleSmartMVPAreaChart extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Area Chart' ,'Pixelentity Theme/Plugin')
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
					  'default'     => '<h4>SmartMvp <strong>breathes new life</strong> into your App, Product or Saas landing page.</h4><p>Exercitationem, hic commodi libero reprehenderit id iusto, consequatur unde pariatur recusandae dicta sequi voluptatum quae corrupti culpa quibusdam nihil error harum itaque praesentium quidem corporis cupiditate voluptatem. Error tempore aperiam nulla saepe corrupti!</p><p><a href="#section-features" class="scrollto"><strong>Learn how customize SmartMvp &#155;</strong></a></p>'
					  ),
				'labels' => 
				array(
					  'label'       => __( 'Graph labels' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Graph labels, comma separated.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => 'January,February,March,April,May,June,July',
					  ),
				"graphs" => 
				array(
					  "label"=> __("Values",'Pixelentity Theme/Plugin'),
					  "description" => __("Add one or more graphs",'Pixelentity Theme/Plugin'),
					  "type"=>"Items",
					  "description" => "",
					  "button_label" => __("Add New Graph",'Pixelentity Theme/Plugin'),
					  "sortable" => true,
					  "auto" => "#C0392B",
					  "unique" => false,
					  "editable" => false,
					  "legend" => true,
					  "fields" => 
					  array(
							array(
								  "name" => "color",
								  "type" => "text",
								  "width" => "100",
								  "default" => "#C0392B"
								  ),
							array(
								  "name" => "values",
								  "type" => "text",
								  "width" => "500",
								  "default" => "10,20,20,15,25,37,32"
								  )
							),
					  "default" => 
					  array(
							array(
								  "color"=>'#C0392B',
								  "values"=>'10,20,20,15,25,37,32'
								  ),
							array(
								  "color"=>'#323A45',
								  "values"=>'20,23,33,57,74,81,96'
								  )
							)
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
		return __( 'Area Chart' ,'Pixelentity Theme/Plugin');
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
		peTheme()->get_template_part( 'viewmodule', 'areachart' );
	}

	public function tooltip() {
		return __( 'Use this block to add an Action section.' ,'Pixelentity Theme/Plugin');
	}

}

?>