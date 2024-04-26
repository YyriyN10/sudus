<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_page_about' );

	function sudus_page_about(){
		Block::make(  __('About operation') )
		     ->add_fields( array(
			     Field::make_text('page_about_block_title', 'Заголовок блоку'),
			     Field::make_rich_text('page_about_text', 'Опис оперпації'),
			     Field::make_image('page_about_image', 'Зображення блоку'),
			     Field::make_text('page_about_operation_count', 'Кількість операцій проведених лікареми'),
			     Field::make_image('page_about_operation_icon', 'Іконка операції в описі лікаря')
						->set_value_type('url'),
			     Field::make_text('page_about_doctor', 'Про лікаря в операції')

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     $i = 0;
			     ?>

			     <!-- Опис операції -->

			     <section class="about-operation indent-top-big indent-bottom-big">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['page_about_block_title'];?></h2>
					     </div>
					     <div class="row">
						     <div class="text-content col-lg-5">
							     <div class="text"><?php echo $fields['page_about_text'];?></div>
							     <div class="doctor">
								     <p class="count">
									     <img src="<?php echo $fields['page_about_operation_icon'];?>" alt="" class="svg-pic">
									     <span><?php echo $fields['page_about_operation_count'];?></span>
								     </p>
								     <p class="doctor-text"><?php echo $fields['page_about_doctor'];?></p>
							     </div>
						     </div>
						     <div class="pic-wrapper col-lg-7">
							     <img
								     src="<?php echo wp_get_attachment_image_src($fields['page_about_image'], 'full')[0];?>"
								     alt="<?php echo get_post_meta($fields['page_about_image'], '_wp_attachment_image_alt', TRUE);?>"
							     >
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




