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
			     Field::make_image('home_contact_form_image', 'Зображення блоку')

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Контактна форма -->
			     <section class="contact-form">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title small-margin col-12 text-center"><?php echo $fields['home_contact_form_block_title'];?></h2>
						     <h3 class="subtitle col-12 text-center"><?php echo $fields['home_contact_form_subtitle'];?></h3>
						     <div class="content col-lg-10 offset-lg-1 col-12">
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
								     <button type="submit" class="button red-btn"><?php echo $fields['home_call_form_btn_text'];?></button>
								     <p>Відправляючи свої дані, я ознайомлений(а) з <a href="">Політикою конфіденційності</a></p>
							     </form>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




