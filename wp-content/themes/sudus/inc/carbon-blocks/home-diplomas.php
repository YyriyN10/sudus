<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_diplomas' );

	function sudus_home_diplomas(){
		Block::make(  __('Diplomas') )
		     ->add_fields( array(
			     Field::make_text('home_diplomas_block_title', 'Заголовок блоку'),
			     Field::make_complex('home_diplomas_list', 'Перелік дипломів та сертифікатів')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва диплому/сертифікату'),
				          Field::make_image('image', 'Зображення'),
			          ))
		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Досвід лікаря -->
			     <section class="doctor-diplomas indent-top-big animation-tracking">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title col-12 text-center"><?php echo $fields['home_diplomas_block_title'];?></h2>
					     </div>
					     <?php if( $fields['home_diplomas_list'] ):?>
					     <div class="row second-up">
						     <div class="content col-xl-10 offset-xl-1 col-12">
							     <?php foreach( $fields['home_diplomas_list'] as $item):?>
								     <div class="item">
									     <div class="pic-wrapper">
										     <img
                             class="lazy"
											     data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
											     alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
										     >
                         <a href="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>" data-fancybox = "diploma" class="zoom">+</a>
									     </div>
									     <p><?php echo $item['name'];?></p>
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




