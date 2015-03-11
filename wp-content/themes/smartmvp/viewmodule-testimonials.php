<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" class="section-type-testimonials testimonial-press light-bg <?php if ( 'light' === $data->typography ) echo 'dark'; ?>" <?php echo $style; ?>>

	<div class="container vmiddle">
		 <div class="row">
			 <div class="col-md-12">
				 <?php if (!empty($data->title)): ?>
				 <h2><?php echo $data->title; ?></h2>
				 <?php endif; ?>
				 <?php if (!empty($data->subtitle)): ?>
				 <?php echo strtr($data->subtitle,array('<p>'=>'<p class="large">')); ?>
				 <?php endif; ?>
			 </div>
		 </div>

		 <?php if (!empty($items)): ?>
		 <div class="row">
			 <div class="tabs testimonials tab-container">
				 <div class="col-md-8">
					 <div class="panel-container">
						 <?php $count = 1; ?>
						 <?php foreach ($items as $item): ?>
						 <?php $id = sprintf('tab-section%s-%s',$bid,$count++); ?>
						 <div class="tab-block" id="<?php echo esc_attr($id); ?>">
							 <blockquote>
								 <?php if (!empty($item->content)): ?>
								 <?php echo $item->content; ?>
								 <?php endif; ?>
								 <?php if (!empty($item->image)): ?>
								 <img src="<?php echo esc_url($item->image); ?>" alt="" />
								 <?php endif; ?>
								 <!-- Testimonial info -->
								 <p class="testimonial-name"><span><?php echo $item->name ?></span><?php echo $item->role; ?></p>
							 </blockquote>
						 </div><!-- /End Tab-block -->
						 <?php endforeach; ?>
					 </div><!-- /End Panel-container -->
				 </div><!-- /End Col -->
				 
				 <ul class="etabs col-md-4 list-unstyled">
					 <?php $count = 1; ?>
					 <?php foreach ($items as $item): ?>
					 <?php $id = sprintf('#tab-section%s-%s',$bid,$count++); ?>
					 <li class="tab col-md-6">
						 <a href="<?php echo esc_url($id) ?>">
							 <?php if (!empty($item->logo)): ?>
							 <img src="<?php echo esc_url($item->logo); ?>" alt="" />
							 <?php endif; ?>
						 </a>
					 </li>
					 <?php endforeach; ?>
				 </ul><!-- /End Etabs --> 

			 </div><!-- /End Tabs --> 
		 </div><!-- /End Row -->
		 <?php endif; ?>
	</div>

</section>