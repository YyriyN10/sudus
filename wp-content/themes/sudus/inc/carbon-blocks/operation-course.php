<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_page_course' );

	function sudus_page_course(){
		Block::make(  __('Operation course') )
		     ->add_fields( array(
			     Field::make_text('page_course_block_title', 'Заголовок блоку'),
			     Field::make_image('page_course_image', 'Зображення блоку'),
			     Field::make_complex('page_course_list', 'Перелік кроків')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва кроку'),
				          Field::make_rich_text('description', 'Опис')
			          ))

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     $i = 0;
			     ?>

			     <!-- Хід операції -->
			     <section class="operation-course indent-top-big indent-bottom-big animation-tracking">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['page_course_block_title'];?></h2>
					     </div>
               <div class="row second-up">
                 <div class="content col-12">
		               <?php if( $fields['page_course_list'] ):?>
                     <ul class="way-list">
				               <?php foreach( $fields['page_course_list'] as $item ): $i++;?>
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
		               <?php if( $fields['page_course_image'] ):?>
                     <div class="pic-wrapper">
                       <div class="inner">
                         <img
                             src="<?php echo wp_get_attachment_image_src($fields['page_course_image'], 'full')[0];?>"
                             alt="<?php echo get_post_meta($fields['page_course_image'], '_wp_attachment_image_alt', TRUE);?>"
                         >
                       </div>
                     </div>
		               <?php endif;?>
                 </div>
               </div>

				     </div>
			     </section>

			     <?php
		     } );
	}




