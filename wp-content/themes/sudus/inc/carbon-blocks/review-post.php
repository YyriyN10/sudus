<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	use Carbon_Fields\Block;

	add_action('carbon_fields_register_fields', 'sudus_reviews_post_fields');

	function sudus_reviews_post_fields(){

		Container::make( 'post_meta', __('Вміст відгуку') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'reviews' );
		         } )

		         ->add_fields( array(
			         Field::make( 'text', 'sudus_reviews_ears_old', 'Вік'),
			         Field::make( 'text', 'sudus_reviews_what', 'Що було зроблено'),
			         Field::make_file('sudus_reviews_video')
			          ->set_value_type('url')
		         ));
	}

	add_action( 'carbon_fields_register_fields', 'sudus_home_reviews' );

	function sudus_home_reviews(){
		Block::make(  __('Our Reviews') )
		     ->add_fields( array(
			     Field::make_text('home_reviews_block_title', 'Заголовок блоку'),

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     ?>

			     <!-- Відгуки -->
			     <section class="reviews indent-top-big">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['home_reviews_block_title'];?></h2>
					     </div>
					     <div class="row">
						     <div class="slider-wrapper col-12" id="reviews-slider">
							      <?php
							      	$reviewsArgs = array(
							      		'posts_per_page' => -1,
							      		'orderby' 	 => 'date',
							      		'post_type'  => 'reviews',
							      		'post_status'    => 'publish'
							      	);

							      	$reviewsList = new WP_Query( $reviewsArgs );

							      		  if ( $reviewsList->have_posts() ) :

							      			  while ( $reviewsList->have_posts() ) : $reviewsList->the_post();
							      		?>
											        <div class="slide">
												        <div class="video-wrapper">
													        <video src="<?php echo carbon_get_post_meta(get_the_ID(), 'sudus_reviews_video');?>"></video>
													        <button class="play"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
															        <path d="M19 0C8.5234 0 0 8.5234 0 19C0 29.4766 8.5234 38 19 38C29.4766 38 38 29.4766 38 19C38 8.5234 29.4766 0 19 0ZM28.8566 19.5231L14.9232 29.0231C14.8162 29.096 14.6914 29.1333 14.5667 29.1333C14.4653 29.1333 14.3634 29.1093 14.2709 29.0599C14.0632 28.9503 13.9333 28.735 13.9333 28.5V9.5C13.9333 9.26503 14.0632 9.0497 14.2709 8.94013C14.4786 8.82993 14.7294 8.84513 14.9239 8.97687L28.8572 18.4769C29.0295 18.5947 29.1333 18.7904 29.1333 19C29.1333 19.2096 29.0295 19.4053 28.8566 19.5231Z" fill="white"/>
														        </svg></button>
												        </div>
												        <div class="info">
													        <p class="name"><?php the_title();?>, <?php echo carbon_get_post_meta(get_the_ID(), 'sudus_reviews_ears_old');?></p>
													        <p class="description"><?php echo carbon_get_post_meta(get_the_ID(), 'sudus_reviews_what');?></p>
												        </div>
											        </div>

							      		<?php endwhile;?>
							      	<?php endif; ?>
							      <?php wp_reset_postdata(); ?>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}