<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Шаблон сторінки "Тип операції"
	 *
	 * Template post type: our_operations
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package sudus
	 */

	get_header();?>


	<!-- Головний екран операції -->
	<section class="operation-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
	  <div class="container">
	    <div class="row">
	      <h1 class="block-title col-12 text-center"><?php the_title();?></h1>
	    </div>
	  </div>
	</section>

<?php the_content();?>

<?php get_footer();
