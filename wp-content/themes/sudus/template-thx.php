<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Шаблон сторінки подяки
	 *
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package sudus
	 */

	get_header();
?>
	<?php the_content();?>
<?php get_footer();
