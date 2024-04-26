<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_advantages_clinic' );

	function sudus_home_advantages_clinic(){
		Block::make(  __('Advantages clinic') )
		     ->add_fields( array(
			     Field::make_text('home_advantages_clinic_block_title', 'Заголовок блоку'),
			     Field::make_complex('home_advantages_clinic_list', 'Перелік')
			      ->set_min(3)
			      ->set_max(3)
			      ->add_fields(array(
			      	Field::make_text('name', 'Назва'),
				      Field::make_textarea('text', 'Текст'),
				      Field::make_image('image', 'Зображення')
			      )),
			     Field::make_image('home_advantages_clinic_video', 'Відео')
			      ->set_type('video')
			      ->set_value_type('url')

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		     	$i = 0;
			     ?>

			     <!-- Переваги клініки -->
			     <section class="advantages-clinic indent-top-big indent-bottom-big animation-tracking" id="about-clinic">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title col-12 text-center"><?php echo $fields['home_advantages_clinic_block_title'];?></h2>
					     </div>
					     <?php if( $fields['home_advantages_clinic_list'] ):?>
						     <div class="row second-up">
									<ul class="col-12 content">
										<?php foreach( $fields['home_advantages_clinic_list'] as $item ): $i++;?>
											<?php if( $i == 2 ):?>
												<li class="item center-item">
													<span class="pic-wrapper">
														<img
															src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
															alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
														>
													</span>
                          <span class="info">
                            <span class="subtitle"><?php echo $item['name'];?></span>
													  <span class="text"><?php echo $item['text'];?></span>
                          </span>
                          <span class="number">0<?php echo $i;?></span>

												</li>
											<?php else:?>
												<li class="item">
                          <span class="info">
                            <span class="subtitle"><?php echo $item['name'];?></span>
													  <span class="text"><?php echo $item['text'];?></span>
                          </span>

													<span class="pic-wrapper absolut">
														<img
															src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
															alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
														>
													</span>
													<span class="number">0<?php echo $i;?></span>
												</li>
											<?php endif;?>

										<?php endforeach;?>

									</ul>
						     </div>
					     <?php endif;?>
					     <?php /*if( $fields['home_advantages_clinic_video'] ):*/?><!--
						     <div class="row">
							     <div class="video-wrapper col-12">
								     <video src="<?php /*echo $fields['home_advantages_clinic_video'];*/?>" controls></video>
							     </div>
						     </div>
					     --><?php /*endif;*/?>
				     </div>
			     </section>

			     <?php
		     } );
	}




