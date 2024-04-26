<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_our_operation' );

	function sudus_home_our_operation(){
		Block::make(  __('Our operation') )
		     ->add_fields( array(
			     Field::make_text('home_our_operation_block_title', 'Заголовок блоку'),
			     Field::make_text('home_our_operation_btn_text', 'Текст у кнопці')

		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     ?>

			     <!-- Операції які ми проводимо-->
			     <?php
			     $operationArgs = array(
				     'posts_per_page' => -1,
				     'orderby' 	 => 'date',
				     'post_type'  => 'our_operations',
				     'post_status'    => 'publish'
			     );

			     $operationList = new WP_Query( $operationArgs );

			     if ( $operationList->have_posts() ) :?>
			     <section class="our-operation indent-top-big indent-bottom-big animation-tracking" id="our-operation">
				     <div class="container">
					     <div class="row first-up">
						     <h2 class="block-title col-12 text-center basic-margin"><?php echo $fields['home_our_operation_block_title'];?></h2>
					     </div>
               <div class="row second-up">
                 <ul class="content col-12">
	                 <?php  while ( $operationList->have_posts() ) : $operationList->the_post(); ?>
                    <li class="item">
                      <a href="<?php the_permalink();?>" target="_blank">
                        <span><?php the_title();?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="8" viewBox="0 0 31 8" fill="none">
                          <path d="M30.3536 4.35355C30.5488 4.15829 30.5488 3.84171 30.3536 3.64645L27.1716 0.464466C26.9763 0.269204 26.6597 0.269204 26.4645 0.464466C26.2692 0.659728 26.2692 0.976311 26.4645 1.17157L29.2929 4L26.4645 6.82843C26.2692 7.02369 26.2692 7.34027 26.4645 7.53553C26.6597 7.7308 26.9763 7.7308 27.1716 7.53553L30.3536 4.35355ZM0 4.5H30V3.5H0V4.5Z" fill="#15D4B2"/>
                        </svg>
                      </a>
                    </li>
	                 <?php endwhile;?>
                   <li>
                     <a href="#" class="button red-btn" rel="nofollow" data-toggle="modal" data-target="#formModal"><?php echo $fields['home_our_operation_btn_text'];?></a>
                   </li>
                 </ul>
               </div>
				     </div>
			     </section>
			     <?php endif; ?>
			     <?php wp_reset_postdata(); ?>

			     <?php
		     } );
	}




