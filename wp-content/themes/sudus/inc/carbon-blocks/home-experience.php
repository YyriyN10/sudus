<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_experience' );

	function sudus_home_experience(){
		Block::make(  __('Experience') )
		     ->add_fields( array(
		     	 Field::make_text('home_experience_block_title', 'Заголовок блоку'),
			     Field::make_text('home_experience_block_subtitle', 'Підзаголовок блоку'),
			     Field::make_complex('home_experience_type_list', 'Етапи досвіду')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва етапу'),
				          Field::make_image('image', 'Зображення етапу'),
				          Field::make_complex('sublist', 'Періуд')
										->add_fields(array(
											Field::make_text('start_stop', 'роки від і до'),
											Field::make_text('description', 'Опис')
										))

			          ))
		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Досвід лікаря -->
			     <section class="doctor-experience indent-top-big indent-bottom-big">
				     <div class="container">
					     <div class="row">
                 <h2 class="block-title basic-margin{ col-12 text-center"><?php echo $fields['home_experience_block_title'];?></h2>
                 <?php if( $fields['home_experience_block_subtitle'] ):?>
                   <p class="text col-lg-8 offset-lg-2 col-md-10 offset-lg-1 col-12 text-center"><?php echo $fields['home_experience_block_subtitle'];?></p>
                 <?php endif;?>
                 <?php if( $fields['home_experience_type_list'] ): $i = 0; $j = 0;?>
                   <ul class="nav nav-tabs col-12">
                     <?php foreach( $fields['home_experience_type_list'] as $item ): $i++;?>
                       <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#experience<?php echo $i;?>"><?php echo $item['name'];?></a>
                       </li>
                     <?php endforeach;?>
                   </ul>
                   <div class="tab-content col-12">
                     <?php foreach( $fields['home_experience_type_list'] as $item ): $j++;?>
                       <div class="tab-pane" id="experience<?php echo $j;?>">
                         <div class="inner">
                           <?php if( $item['sublist'] ):?>
                             <ul>
                               <?php foreach( $item['sublist'] as $subItem ):?>
                                 <li>
                                   <svg xmlns="http://www.w3.org/2000/svg" width="74" height="17" viewBox="0 0 74 17" fill="none">
                                     <rect y="7" width="71" height="3" fill="#074584"/>
                                     <circle cx="65.5" cy="8.5" r="8.5" fill="#14E4BF"/>
                                   </svg>
                                   <span class="date"><?php echo $subItem['start_stop'];?></span>
                                   <span class="description"><?php echo $subItem['description'];?></span>
                                 </li>
                               <?php endforeach;?>
                             </ul>
                           <?php endif;?>
                           <div class="pic-wrapper">
                             <img
                                 src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
                                 alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
                             >
                           </div>
                         </div>
                       </div>
                     <?php endforeach;?>
                   </div>
                 <?php endif;?>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




