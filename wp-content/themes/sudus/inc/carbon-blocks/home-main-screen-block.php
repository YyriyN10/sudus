<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'sudus_home_main_screen' );

	function sudus_home_main_screen(){
		Block::make(  __('Main Screen') )
		     ->add_fields( array(
			     Field::make_text('home_main_screen_title', 'Головний заголовок' ),
			     Field::make_image('home_main_screen_image', 'Зображення лікаря' ),
			     Field::make_text('home_main_screen_subtitle', 'Підзаголовок' ),
			     Field::make_text('home_main_screen_btn_text', 'Текст у кнопці' ),
			     Field::make_image('home_main_screen_bg_pic', 'Фонове зображення' )
            ->set_value_type('url')
		     ) )

		     ->set_category( 'sudus-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Головний екран -->
			     <section class="main-screen" >
			       <div class="container">
			         <div class="row">
			           <div class="content col-xl-10 offset-xl-1 col-12 offset-0">
				           <div class="text-content">
					           <h1><?php echo $fields['home_main_screen_title']; ?></h1>
					           <?php if( $fields['home_main_screen_subtitle'] ):?>
						           <p><?php echo $fields['home_main_screen_subtitle']; ?></p>
					           <?php endif;?>
					           <?php if( $fields['home_main_screen_btn_text'] ):?>
						           <a href="#" rel="nofollow" class="button red-btn" data-toggle="modal" data-target="#formModal"><?php echo $fields['home_main_screen_btn_text']; ?></a>
					           <?php endif;?>
				           </div>
				           <?php if( $fields['home_main_screen_image'] ):?>
                     <div class="men-pic">
                       <img
                           src="<?php echo wp_get_attachment_image_src($fields['home_main_screen_image'], 'full')[0];?>"
                           alt="<?php echo get_post_meta($fields['home_main_screen_image'], '_wp_attachment_image_alt', TRUE);?>"
                       >
                     </div>
				           <?php endif;?>
                   <svg class="pulse-line left" xmlns="http://www.w3.org/2000/svg" width="255" height="215" viewBox="0 0 255 215" fill="none">
                     <g clip-path="url(#clip0_1698_2)">
                       <path d="M1182.5 135.2H252.21C252.11 135.2 252.01 135.2 251.91 135.2C251.11 135.4 250.21 135.5 249.41 135.4C244.71 135.1 241.71 131.1 238.21 126.4C234.81 121.8 230.91 116.6 224.71 115C221.21 114.1 217.21 114.3 213.51 115.8C207.91 117.9 204.41 122.6 201.41 126.7C198.21 131 195.41 134.7 190.81 135.2C190.11 135.3 189.41 135.3 188.71 135.2H188.61H156.81C155.31 135 153.91 135.1 152.51 135.5C136.61 139.6 134.31 177 133.01 199.4C132.81 202.4 132.61 205.4 132.41 207.8C129.91 193.9 126.31 150.6 123.11 111.8C120.91 84.8 118.61 56.9 116.41 36.1C112.91 0 111.41 0 109.51 0C106.41 0 105.01 7.5 99.4104 80.6C96.4104 118.8 92.4104 170.3 89.0104 178.8C88.4104 177.1 87.7104 173.7 87.1104 170.7C84.4104 157.8 80.4104 138.3 68.4104 135.5C67.1104 135.2 65.7104 135.1 64.5104 135.2H45.0104C44.9104 135.2 44.9103 135.2 44.8104 135.2C44.2104 135.3 43.6104 135.3 43.1104 135.2C40.7104 134.8 39.2104 132.9 37.5104 130.7C35.8104 128.5 33.8104 125.9 30.5104 124.7C27.7104 123.6 25.2104 124 24.0104 124.1C19.5104 124.7 16.7104 127.2 14.0104 129.6C11.4104 131.9 8.9104 134.1 5.01038 134.9C3.71039 135.2 2.31036 135.2 0.710388 135.1H-532.644C-533.444 135.1 -532.644 135.7 -532.644 136.5C-532.644 137.3 -533.444 137.9 -532.644 137.9H0.610413C2.31042 138 3.9104 138 5.61041 137.6C10.3104 136.7 13.3104 134 15.9104 131.6C18.5104 129.3 20.8104 127.2 24.4104 126.8C25.4104 126.7 27.3104 126.4 29.5104 127.2C32.0104 128.2 33.6104 130.2 35.3104 132.3C37.2104 134.8 39.2104 137.3 42.8104 137.9C43.6104 138 44.4104 138 45.2104 137.9H64.7104C65.8104 137.8 66.8104 137.9 67.8104 138.1C78.0104 140.5 82.0104 159.6 84.3104 171C85.9103 179 86.6104 182.3 89.0104 182.3C93.5104 182.3 95.9103 164.1 102.31 80.6C104.71 49.2 107.51 14.1 109.61 4.6C112.51 16.5 116.81 69 120.41 111.9C128.21 205.8 129.61 214.6 132.91 214.5C135.01 214.4 135.21 212.3 136.01 199.3C137.21 179.1 139.51 141.6 153.41 138C154.41 137.7 155.61 137.7 156.71 137.8C156.81 137.8 156.81 137.8 156.91 137.8H188.71C189.61 137.9 190.51 137.9 191.31 137.8C197.11 137.2 200.61 132.6 203.91 128.1C206.81 124.2 209.91 120.1 214.71 118.2C217.91 117 221.21 116.7 224.11 117.5C229.31 118.9 232.71 123.5 236.01 127.9C239.61 132.7 243.31 137.7 249.31 138C250.31 138.1 251.41 138 252.41 137.8H1182L1182.5 135.2Z" fill="#14E4BF"/>
                     </g>
                     <defs>
                       <clipPath id="clip0_1698_2">
                         <rect width="255" height="215" fill="white"/>
                       </clipPath>
                     </defs>
                   </svg>
			           </div>
			         </div>
			       </div>
             <div class="bg-image" style="background-image: url(<?php echo ( $fields['home_main_screen_bg_pic'] ); ?>)"></div>
			     </section>

			     <?php
		     } );
	}




