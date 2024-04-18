<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_advantages_numbers' );

	function sudus_home_advantages_numbers(){
		Block::make(  __('Advantages numbers') )
		     ->add_fields( array(
		     	Field::make_complex('home_advantages_numbers_list', 'Перелік досягнень в цифрах')
						->add_fields(array(
							Field::make_text('number', 'Цифра досягненя'),
							Field::make_text('description', 'Опис досягнення')
						))
		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Переваги у цифрах -->
			     <section class="advantages-numbers">
				     <div class="container">
					     <div class="row">
						     <div class="content col-12">
							     <?php if( $fields['home_advantages_numbers_list'] ):?>
								     <ul>
									     <?php foreach( $fields['home_advantages_numbers_list'] as $item ):?>
										     <li>
											     <span class="number"><?php echo $item['number'];?></span>
											     <span class="description"><?php echo $item['description'];?></span>
										     </li>
									     <?php endforeach;?>
								     </ul>
							     <?php endif;?>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




