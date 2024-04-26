<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_page_care_your_hart' );

	function sudus_page_care_your_hart(){
		Block::make(  __('Care your hart') )
		     ->add_fields( array(
			     Field::make_text('page_care_your_hart_block_title', 'Заголовок блоку'),
			     Field::make_text('page_care_your_hart_subtitle', 'Підзаголовок блоку'),
			     Field::make_complex('page_care_your_hart_list', 'Перелік переваг')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва'),
				          Field::make_image('image', 'Зображення')
                    ->set_value_type('url')
			          )),

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     ?>

			     <!-- Подбай про своє серце -->
			     <section class="care-your-hart indent-top-big indent-bottom-big animation-tracking">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title col-12 small-margin text-center first-up"><?php echo $fields['page_care_your_hart_block_title'];?></h2>
						     <p class="subtitle col-12 text-center second-up"><?php echo $fields['page_care_your_hart_block_title'];?></p>
					     </div>
					     <?php if( $fields['page_care_your_hart_list'] ):?>
						     <div class="row content third-up">
							     <?php foreach( $fields['page_care_your_hart_list'] as $item ):?>
								     <div class="item col-lg-3 col-sm-6">
                       <div class="icon-wrapper">
                         <img src="<?php echo $item['image'];?>" alt="" class="svg-pic">
                       </div>
                       <p class="description"><?php echo $item['name'];?></p>
								     </div>
							     <?php endforeach;?>
						     </div>
					     <?php endif;?>
				     </div>
			     </section>

			     <?php
		     } );
	}




