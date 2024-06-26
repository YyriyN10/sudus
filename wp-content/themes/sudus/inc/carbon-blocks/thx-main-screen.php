<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_thx_main_screen' );

	function sudus_thx_main_screen(){
		Block::make(  __('Thx main screen') )
		     ->add_fields( array(
			     Field::make_text('page_thx_main_screen_block_title', 'Заголовок'),
			     Field::make_text('page_thx_main_screen_text', 'Текст'),

		     ) )
		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     $i = 0;
			     ?>

			     <!-- Головний керан -->

			     <section class="thx-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
				     <p class="watermark">CARDIOLOGY</p>
				     <div class="container">
					     <div class="row">
						     <div class="content col-12 text-center">
							     <h1 class="block-title big-margin"><?php echo $fields['page_thx_main_screen_block_title'];?></h1>
							     <p><?php echo $fields['page_thx_main_screen_text'];?></p>
							     <a href="<?php echo get_home_url('/');?>" class="button red-btn">Повернутися на сторінку</a>
						     </div>
					     </div>
				     </div>
				     <svg class="pulse" xmlns="http://www.w3.org/2000/svg" width="1440" height="215" viewBox="0 0 1440 215" fill="none">
					     <path d="M1574.5 135.2H644.21C644.11 135.2 644.01 135.2 643.91 135.2C643.11 135.4 642.21 135.5 641.41 135.4C636.71 135.1 633.71 131.1 630.21 126.4C626.81 121.8 622.91 116.6 616.71 115C613.21 114.1 609.21 114.3 605.51 115.8C599.91 117.9 596.41 122.6 593.41 126.7C590.21 131 587.41 134.7 582.81 135.2C582.11 135.3 581.41 135.3 580.71 135.2H580.61H548.81C547.31 135 545.91 135.1 544.51 135.5C528.61 139.6 526.31 177 525.01 199.4C524.81 202.4 524.61 205.4 524.41 207.8C521.91 193.9 518.31 150.6 515.11 111.8C512.91 84.8 510.61 56.9 508.41 36.1C504.91 0 503.41 0 501.51 0C498.41 0 497.01 7.5 491.41 80.6C488.41 118.8 484.41 170.3 481.01 178.8C480.41 177.1 479.71 173.7 479.11 170.7C476.41 157.8 472.41 138.3 460.41 135.5C459.11 135.2 457.71 135.1 456.51 135.2H437.01C436.91 135.2 436.91 135.2 436.81 135.2C436.21 135.3 435.61 135.3 435.11 135.2C432.71 134.8 431.21 132.9 429.51 130.7C427.81 128.5 425.81 125.9 422.51 124.7C419.71 123.6 417.21 124 416.01 124.1C411.51 124.7 408.71 127.2 406.01 129.6C403.41 131.9 400.91 134.1 397.01 134.9C395.71 135.2 394.31 135.2 392.71 135.1H-140.644C-141.444 135.1 -140.644 135.7 -140.644 136.5C-140.644 137.3 -141.444 137.9 -140.644 137.9H392.61C394.31 138 395.91 138 397.61 137.6C402.31 136.7 405.31 134 407.91 131.6C410.51 129.3 412.81 127.2 416.41 126.8C417.41 126.7 419.31 126.4 421.51 127.2C424.01 128.2 425.61 130.2 427.31 132.3C429.21 134.8 431.21 137.3 434.81 137.9C435.61 138 436.41 138 437.21 137.9H456.71C457.81 137.8 458.81 137.9 459.81 138.1C470.01 140.5 474.01 159.6 476.31 171C477.91 179 478.61 182.3 481.01 182.3C485.51 182.3 487.91 164.1 494.31 80.6C496.71 49.2 499.51 14.1 501.61 4.6C504.51 16.5 508.81 69 512.41 111.9C520.21 205.8 521.61 214.6 524.91 214.5C527.01 214.4 527.21 212.3 528.01 199.3C529.21 179.1 531.51 141.6 545.41 138C546.41 137.7 547.61 137.7 548.71 137.8C548.81 137.8 548.81 137.8 548.91 137.8H580.71C581.61 137.9 582.51 137.9 583.31 137.8C589.11 137.2 592.61 132.6 595.91 128.1C598.81 124.2 601.91 120.1 606.71 118.2C609.91 117 613.21 116.7 616.11 117.5C621.31 118.9 624.71 123.5 628.01 127.9C631.61 132.7 635.31 137.7 641.31 138C642.31 138.1 643.41 138 644.41 137.8H1574L1574.5 135.2Z" fill="#14E4BF"/>
				     </svg>
			     </section>

			     <?php
		     } );
	}




