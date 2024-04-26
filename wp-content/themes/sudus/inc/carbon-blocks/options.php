<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_cgbc_options' );

	function yuna_cgbc_options() {
		Container::make( 'theme_options', __('Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( __( 'Contacts' ), array(
		         	  Field::make_text('clinic_rial_address', 'Адреса клініки'),
			          Field::make_text('site_email', 'Електронна пошта')
			            ->set_attribute('type', 'email'),
			          Field::make_text('viber_link', 'Посилання на вайбер')
			            ->set_attribute('type', 'url'),
			          Field::make_text('telegram_link', 'Посилання на телеграм')
			              ->set_attribute('type', 'url'),
			          Field::make_text('youtube_link', 'Посилання на youtube')
			              ->set_attribute('type', 'url'),
			          Field::make_text('fb_link', 'Посилання на facebook')
			              ->set_attribute('type', 'url'),
			          Field::make_text('instagram_link', 'Посилання на instagram')
			              ->set_attribute('type', 'url'),
			          Field::make_text('phone', 'Контактний телефон')
			              ->set_attribute('type', 'phone'),
			          Field::make_text('week_working_time', 'Розклад роботи у будні')
			            ->help_text('8:00 - 20:00'),
			          Field::make_text('saturday_working_time', 'Розклад роботи у суботу')
			              ->help_text('9:00 - 15:00'),
			          Field::make_text('sunday_working_time', 'Розклад роботи у неділю')
			              ->help_text('вихідний'),
			          Field::make_map('map_point', 'Оберіть точку на карті')
		         ) )

		         ->add_tab( __( 'Site options' ), array(
		         	  Field::make_association('policy_page', 'Сторінка політики конфіденційності')
			            ->set_types( array(
				            array(
					            'type'      => 'post',
					            'post_type' => 'page',
				            )
			            ) )
			            ->set_max( 1 )


		         ) )

		         ->add_tab( __( 'Contact form options' ), array(

		         ) );

	}
