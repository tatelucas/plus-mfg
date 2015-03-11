<?php

class PeThemeViewLayoutModuleSmartMVPPieChart extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  'title' => '',
				  'type' => __( 'Pie Chart' ,'Pixelentity Theme/Plugin')
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
					  'description' => __( 'Section title.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Get out of the Building',
					  ),
				'subtitle' => 
				array(
					  'label'       => 'Subtitle',
					  'type'        => 'Text',
					  'description' => __( 'Section subtitle.' ,'Pixelentity Theme/Plugin'),
					  'default'     => 'Ideal for SaaS, Web Apps, Mobile Apps and all kind of Marketing websites..'
					  ),
				'content' => 
				array(
					  'label'       => 'Content',
					  'type'        => 'Editor',
					  'noscript'    => true,
					  'description' => __( 'Section content.' ,'Pixelentity Theme/Plugin'),
					  'default'     => '<h4>Everything you need to get your Startup Business online and ready to go.</h4><p>Perferendis aliquid accusamus nostrum recusandae maxime dolor dolorum numquam pariatur quasi sit, in, culpa hic, fugiat dignissimos fuga necessitatibus tempore molestias ipsum corporis distinctio. Minima mollitia.</p><p><a class="scrollto" href="#section-signup"><strong>Join with us. It will only take a minute &#155;</strong></a></p>'
					  ),
				'graph1_label' => 
				array(
					  'label'       => __( 'Graph 1 label' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Graph 1 text.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => '100&#37;<span>Crafted with<br> Passion</span>',
					  ),
				"graph1_values" => 
				array(
					  "label"=> __("Values",'Pixelentity Theme/Plugin'),
					  "description" => __("Add one or more graph values",'Pixelentity Theme/Plugin'),
					  "type"=>"Items",
					  "description" => "",
					  "button_label" => __("Add New Graph Value",'Pixelentity Theme/Plugin'),
					  "sortable" => true,
					  "auto" => __("Label %",'Pixelentity Theme/Plugin'),
					  "unique" => false,
					  "editable" => false,
					  "legend" => true,
					  "fields" => 
					  array(
							array(
								  "name" => "label",
								  "type" => "text",
								  "width" => "500",
								  "default" => ""
								  ),
							array(
								  "name" => "value",
								  "type" => "text",
								  "width" => "100",
								  "default" => "50"
								  ),
							array(
								  "name" => "color",
								  "type" => "text",
								  "width" => "100",
								  "default" => "#C0392B"
								  ),
							array(
								  "name" => "hilight",
								  "type" => "text",
								  "width" => "100",
								  "default" => "#EA402F"
								  )
							),
					  "default" => 
					  array(
							array(
								  "label"=>'Beautiful Design',
								  "value"=>'50',
								  "color"=>'#C0392B',
								  "hilight"=>'#EA402F'
								  ),
							array(
								  "label"=>'Responsive Layout',
								  "value"=>'25',
								  "color"=>'#323A45',
								  "hilight"=>'#4C5B70'
								  ),
							array(
								  "label"=>'Persuasive Call to Action',
								  "value"=>'15',
								  "color"=>'#949FB1',
								  "hilight"=>'#A8B3C5'
								  ),
							array(
								  "label"=>'Social Proof',
								  "value"=>'5',
								  "color"=>'#27AE60',
								  "hilight"=>'#29C36A'
								  ),
							)
					  ),
				'graph2_label' => 
				array(
					  'label'       => __( 'Graph 2 label' ,'Pixelentity Theme/Plugin'),
					  'description' => __( 'Graph 2 text.' ,'Pixelentity Theme/Plugin'),
					  'type'        => 'Text',
					  'default'     => '827<span>Cups of<br>Coffee</span>',
					  ),
				"graph2_values" => 
				array(
					  "label"=> __("Values",'Pixelentity Theme/Plugin'),
					  "description" => __("Add one or more graph values",'Pixelentity Theme/Plugin'),
					  "type"=>"Items",
					  "description" => "",
					  "button_label" => __("Add New Graph Value",'Pixelentity Theme/Plugin'),
					  "sortable" => true,
					  "auto" => __("Label %",'Pixelentity Theme/Plugin'),
					  "unique" => false,
					  "editable" => false,
					  "legend" => true,
					  "fields" => 
					  array(
							array(
								  "name" => "label",
								  "type" => "text",
								  "width" => "500",
								  "default" => ""
								  ),
							array(
								  "name" => "value",
								  "type" => "text",
								  "width" => "100",
								  "default" => "50"
								  ),
							array(
								  "name" => "color",
								  "type" => "text",
								  "width" => "100",
								  "default" => "#C0392B"
								  ),
							array(
								  "name" => "hilight",
								  "type" => "text",
								  "width" => "100",
								  "default" => "#EA402F"
								  )
							),
					  "default" => 
					  array(
							array(
								  "label"=>'Cups of Coffee',
								  "value"=>'827',
								  "color"=>'#C0392B',
								  "hilight"=>'#EA402F'
								  ),
							array(
								  "label"=>'Code Hours',
								  "value"=>'1775',
								  "color"=>'#323A45',
								  "hilight"=>'#4C5B70'
								  ),
							array(
								  "label"=>'Design Hours',
								  "value"=>'580',
								  "color"=>'#2980B9',
								  "hilight"=>'#2F97DC'
								  ),
							array(
								  "label"=>'Songs Listened',
								  "value"=>'540',
								  "color"=>'#949FB1',
								  "hilight"=>'#A8B3C5'
								  ),
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
		return __( 'Pie Chart' ,'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __( 'Section' ,'Pixelentity Theme/Plugin');
	}

	public function group() {
		return 'section';
	}

	public function setTemplateData() {
		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->subtitle = empty( $this->data->subtitle ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->subtitle ) );
		// we also render (parent) shortcodes here to keep template file clean;
		$this->data->content = empty( $this->data->content ) ? '' : do_shortcode(apply_filters( 'the_content', $this->data->content ) );
		peTheme()->template->data($this->data,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part( 'viewmodule', 'piechart' );
	}

	public function tooltip() {
		return __( 'Use this block to add an Action section.' ,'Pixelentity Theme/Plugin');
	}

}

?>