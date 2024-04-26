<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_page_call_form' );

	function sudus_page_call_form(){
		Block::make(  __('Operation call form') )
		     ->add_fields( array(
			     Field::make_text('page_call_form_block_title', 'Заголовок блоку'),
			     Field::make_text('page_call_form_text', 'Текст заклику'),
			     Field::make_text('page_call_form_btn_text', 'Текст у кнопці'),

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     $policyPage = carbon_get_theme_option( 'policy_page' );
			     $pageId     = [];

			     foreach ( $policyPage as $item ) {

				     array_push( $pageId, $item['id'] );
			     }
			     ?>

			     <!-- Досвід лікаря -->
			     <section class="page-call-form">
				     <div class="container">
					     <div class="row">
						     <div class="content col-xl-10 offset-xl-1 col-12">
							     <div class="inner">
								     <h2 class="subtitle text-center"><?php echo $fields['page_call_form_block_title'];?></h2>
								     <p class="call-text text-center"><?php echo $fields['page_call_form_text'];?></p>
								     <form action="">
									     <div class="form-group">
										     <input type="text" class="form-control" placeholder="Ваше ім’я" required>
									     </div>
									     <div class="form-group">
										     <input type="tel" class="form-control" placeholder="Ваше телефон" required>
									     </div>
									     <button type="submit" class="button red-btn"><?php echo $fields['page_call_form_btn_text'];?></button>
								     </form>
								     <p class="text-small">Відправляючи свої дані, я ознайомлений(а) з <a href="<?php echo get_page_link( $pageId[0] );?>" target="_blank">Політикою конфіденційності</a></p>
							     </div>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




