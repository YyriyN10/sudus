<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Field;
	use Carbon_Fields\Block;

	add_action( 'carbon_fields_register_fields', 'sudus_home_faq' );

	function sudus_home_faq(){
		Block::make(  __('Our F.A.Q') )
		     ->add_fields( array(
			     Field::make_text('home_faq_block_title', 'Заголовок блоку'),

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

			     ?>

			     <!-- F.A.Q -->
			     <section class="faq indent-top-big indent-bottom-big">
				     <div class="container">
					     <div class="row">
						     <h2 class="block-title larg-margin col-12 text-center"><?php echo $fields['home_faq_block_title'];?></h2>
					     </div>
					     <div class="row">
						     <div class="accordion-faq col-lg-10 offset-lg-1 col-12" id="accordion-faq">
							     <?php
								     $faqArgs = array(
									     'posts_per_page' => -1,
									     'orderby' 	 => 'date',
									     'post_type'  => 'faq',
									     'post_status'    => 'publish'
								     );

								     $faqList = new WP_Query( $faqArgs );

								     if ( $faqList->have_posts() ) :

								     while ( $faqList->have_posts() ) : $faqList->the_post();
							     ?>
								     <div class="card">
									     <div class="card-header">
										     <a class="card-link collapsed" data-toggle="collapse" href="#collapseFaq<?php the_ID();?>">
											     <?php the_title();?>
											     <span class="indicator"></span>
										     </a>
									     </div>
									     <div id="collapseFaq<?php the_ID();?>" class="collapse" data-parent="#accordion-faq">
										     <div class="card-body">
											     <?php the_content();?>
										     </div>
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