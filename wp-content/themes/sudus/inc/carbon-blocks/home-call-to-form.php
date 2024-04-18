<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_call_form' );

	function sudus_home_call_form(){
		Block::make(  __('Call form') )
		     ->add_fields( array(
			     Field::make_text('home_call_form_block_title', 'Заголовок блоку'),
			     Field::make_text('home_call_form_btn_text', 'Текст у кнопці'),

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Досвід лікаря -->
			     <section class="call-form">
				     <div class="container">
					     <div class="row">
						     <div class="content col-lg-10 offset-lg-1 col-12">
							     <div class="inner">
								     <h2 class="subtitle col-12 text-center"><?php echo $fields['home_call_form_block_title'];?></h2>
								     <form action="">
									     <div class="form-group">
										     <input type="text" class="form-control" placeholder="Ваше ім’я" required>
									     </div>
									     <div class="form-group">
										     <input type="tel" class="form-control" placeholder="Ваше телефон" required>
									     </div>
									     <button type="submit" class="button red-btn"><?php echo $fields['home_call_form_btn_text'];?></button>
								     </form>
								     <p>Відправляючи свої дані, я ознайомлений(а) з <a href="">Політикою конфіденційності</a></p>
							     </div>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




