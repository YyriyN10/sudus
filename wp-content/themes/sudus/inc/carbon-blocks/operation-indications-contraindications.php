<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_page_indications_contraindications' );

	function sudus_page_indications_contraindications(){
		Block::make(  __('Indications and contraindications') )
		     ->add_fields( array(
			     Field::make_text('page_indications_contraindications_title', 'Заголовок блоку'),
			     Field::make_complex('page_indications_contraindications_list_1', 'Перелік показань')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва показання')
			          )),
			     Field::make_complex('page_indications_contraindications_list_2', 'Перелік протипоказань')
						     ->add_fields(array(
							     Field::make_text('name', 'Назва протипоказання')
						     ))

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     $i = 0;
			     ?>

			     <!-- Показання та протипоказання -->

			     <section class="indications-contraindications indent-top-big animation-tracking">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['page_indications_contraindications_title'];?></h2>
					     </div>
					     <?php if( $fields['page_indications_contraindications_list_1'] && $fields['page_indications_contraindications_list_2']):?>
						     <div class="content col-xl-10 offset-xl-1 col-12">
							     <div class="indications item second-up">
								     <p class="sign">+</p>
								     <div class="pic-wrapper">
                       <img class="lazy" data-src="<?php echo THEME_PATH;?>/assets/img/indications.png" alt="">
								     </div>
								     <h3 class="name subtitle">Показання</h3>
								     <ul>
									     <?php foreach( $fields['page_indications_contraindications_list_1'] as $item ):?>
										     <li><?php echo $item['name'];?></li>
									     <?php endforeach;?>
								     </ul>
							     </div>
							     <div class="contraindications item third-up">
								     <p class="sign">-</p>
								     <div class="pic-wrapper">
									     <img class="lazy" data-src="<?php echo THEME_PATH;?>/assets/img/contraindications.png" alt="">
								     </div>
								     <h3 class="name subtitle">Протипоказання</h3>
								     <ul>
									     <?php foreach( $fields['page_indications_contraindications_list_2'] as $item ):?>
										     <li><?php echo $item['name'];?></li>
									     <?php endforeach;?>
								     </ul>
							     </div>
						     </div>
					     <?php endif;?>
				     </div>
			     </section>

			     <?php
		     } );
	}




