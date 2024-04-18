<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * WPML Support
	 */

	function ua_teens_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}

		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Create Block Category
	 */

	add_filter( 'block_categories_all' , function( $categories ) {

		$categories[] = array(
			'slug'  => 'sudus-custom-category',
			'title' => 'Sudus Blocks'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	require ('carbon-blocks/options.php');

	require ('carbon-blocks/home-main-screen-block.php');
	require ('carbon-blocks/home-advantages-numbers.php');
	require ('carbon-blocks/home-experience.php');
	require ('carbon-blocks/home-diplomas.php');
	require ('carbon-blocks/home-call-to-form.php');
	require ('carbon-blocks/home-advantages-clinic.php');
	require ('carbon-blocks/home-our-operation.php');
	require ('carbon-blocks/home-price.php');
	require ('carbon-blocks/home-way-treatment.php');
	require ('carbon-blocks/home-faq.php');
	require ('carbon-blocks/home-contact-form.php');

	require ('carbon-blocks/about-block.php');

	require ('carbon-blocks/review-post.php');
	require ('carbon-blocks/media-post.php');
