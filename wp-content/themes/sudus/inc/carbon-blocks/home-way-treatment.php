<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_way_treatment' );

	function sudus_home_way_treatment(){
		Block::make(  __('Way treatment') )
		     ->add_fields( array(
			     Field::make_text('home_way_treatment_block_title', 'Заголовок блоку'),
			     Field::make_image('home_way_treatment_image', 'Зображення блоку'),
			     Field::make_complex('home_way_treatment_list', 'Перелік кроків')
						->add_fields(array(
							Field::make_text('name', 'Назва кроку'),
							Field::make_rich_text('description', 'Опис')
						))

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		     	$i = 0;
			     ?>

			     <!-- Шлях лікування -->
			     <section class="way-treatment indent-top-big indent-bottom-big animation-tracking">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['home_way_treatment_block_title'];?></h2>
					     </div>
               <div class="row">
                 <div class="content col-12 second-up">
		               <?php if( $fields['home_way_treatment_list'] ):?>
                     <ul class="way-list">
				               <?php foreach( $fields['home_way_treatment_list'] as $item ): $i++;?>
                         <li class="item">
                           <p class="step-name">
							               <?php if( $i < 10 ):?>
                               0<?php echo $i;?><span>.</span> <?php echo $item['name'];?>
							               <?php else:?>
								               <?php echo $i;?><span>.</span> <?php echo $item['name'];?>
							               <?php endif;?>
                           </p>
                           <div class="text"><?php echo wpautop($item['description']);?></div>
                         </li>
				               <?php endforeach;?>
                     </ul>
		               <?php endif;?>
		               <?php if( $fields['home_way_treatment_image'] ):?>
                     <div class="pic-wrapper">
                       <img
                           src="<?php echo wp_get_attachment_image_src($fields['home_way_treatment_image'], 'full')[0];?>"
                           alt="<?php echo get_post_meta($fields['home_way_treatment_image'], '_wp_attachment_image_alt', TRUE);?>"
                       >
                     </div>
		               <?php endif;?>
                 </div>
               </div>

				     </div>
             <p class="watermark">heart care</p>
			     </section>

			     <?php
		     } );
	}




