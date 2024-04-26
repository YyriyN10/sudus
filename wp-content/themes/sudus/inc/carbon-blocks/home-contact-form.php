<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_contact_form' );

	function sudus_home_contact_form(){
		Block::make(  __('Contact form') )
		     ->add_fields( array(
			     Field::make_text('home_contact_form_block_title', 'Заголовок блоку'),
			     Field::make_text('home_contact_form_subtitle', 'Підзаголовок'),
			     Field::make_image('home_contact_form_image', 'Зображення блоку'),
			     Field::make_text('home_contact_form_btn_text', 'Текст кнопки'),

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     $policyPage = carbon_get_theme_option( 'policy_page' );
			     $pageId     = [];

			     foreach ( $policyPage as $item ) {

				     array_push( $pageId, $item['id'] );
			     }
			     ?>

			     <!-- Контактна форма -->
			     <section class="contact-form indent-top-big animation-tracking animation-tracking">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title small-margin col-12 text-center first-up"><?php echo $fields['home_contact_form_block_title'];?></h2>
						     <h3 class="subtitle col-12 text-center second-up"><?php echo $fields['home_contact_form_subtitle'];?></h3>
						     <div class="content col-12 third-up">
							     <div class="pic-wrapper">
								     <img
									     src="<?php echo wp_get_attachment_image_src($fields['home_contact_form_image'], 'full')[0];?>"
									     alt="<?php echo get_post_meta($fields['home_contact_form_image'], '_wp_attachment_image_alt', TRUE);?>"
								     >
							     </div>
							     <form action="">
								     <div class="form-group">
									     <input type="text" class="form-control" placeholder="Ваше ім’я" required>
								     </div>
								     <div class="form-group">
									     <input type="tel" class="form-control" placeholder="Ваше телефон" required>
								     </div>
								     <button type="submit" class="button red-btn"><?php echo $fields['home_contact_form_btn_text'];?></button>
								     <p>Відправляючи свої дані, я ознайомлений(а) з <a href="<?php echo get_page_link( $pageId[0] );?>" target="_blank">Політикою конфіденційності</a></p>
							     </form>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




