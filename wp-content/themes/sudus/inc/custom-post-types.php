<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Register a F.A.Q post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since sudus1.0
	 */

	function faq_post_type() {

		$labels = array(
			'name'               => _x( 'F.A.Q', 'post type general name', 'sudus' ),
			'singular_name'      => _x( 'F.A.Q', 'post type singular name', 'sudus' ),
			'menu_name'          => _x( 'F.A.Q', 'admin menu', 'sudus' ),
			'name_admin_bar'     => _x( 'F.A.Q', 'add new on admin bar', 'sudus' ),
			'add_new'            => _x( 'Додати нове', 'actions', 'sudus' ),
			'add_new_item'       => __( 'Додати нове питання', 'sudus' ),
			'new_item'           => __( 'Новие питання', 'sudus' ),
			'edit_item'          => __( 'Редагувати питання', 'sudus' ),
			'view_item'          => __( 'Дивитись питання', 'sudus' ),
			'all_items'          => __( 'Всі питання', 'sudus' ),
			'search_items'       => __( 'Шукати питання', 'sudus' ),
			'parent_item_colon'  => __( 'Батько питання:', 'sudus' ),
			'not_found'          => __( 'Питання не знайдено', 'sudus' ),
			'not_found_in_trash' => __( 'У кошику питання не знайдно', 'sudus' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'faq' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'faq' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'editor',)
		);

		register_post_type( 'faq', $args );
	}

	add_action( 'init', 'faq_post_type' );

	/**
	 * Register our operations post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since sudus 1.0
	 */

	function our_operations_post_type() {

		$labels = array(
			'name'               => _x( 'Типи операції', 'post type general name', 'sudus' ),
			'singular_name'      => _x( 'Типи операції', 'post type singular name', 'sudus' ),
			'menu_name'          => _x( 'Типи операції', 'admin menu', 'sudus' ),
			'name_admin_bar'     => _x( 'Типи операції', 'add new on admin bar', 'sudus' ),
			'add_new'            => _x( 'Додати новий', 'actions', 'sudus' ),
			'add_new_item'       => __( 'Додати новий тип', 'sudus' ),
			'new_item'           => __( 'Новиий тип', 'sudus' ),
			'edit_item'          => __( 'Редагувати тип', 'sudus' ),
			'view_item'          => __( 'Дивитись тип', 'sudus' ),
			'all_items'          => __( 'Всі типи', 'sudus' ),
			'search_items'       => __( 'Шукати птип', 'sudus' ),
			'parent_item_colon'  => __( 'Батько птипу:', 'sudus' ),
			'not_found'          => __( 'Тип не знайдено', 'sudus' ),
			'not_found_in_trash' => __( 'У кошику типів не знайдно', 'sudus' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'our_operations' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'our-operations' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'exclude_from_search'=> true,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'our_operations', $args );
	}

	add_action( 'init', 'our_operations_post_type' );

	/**
	 * Register reviews post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since sudus 1.0
	 */

	function reviews_post_type() {

		$labels = array(
			'name'               => _x( 'Відгуки', 'post type general name', 'sudus' ),
			'singular_name'      => _x( 'Відгуки', 'post type singular name', 'sudus' ),
			'menu_name'          => _x( 'Відгуки', 'admin menu', 'sudus' ),
			'name_admin_bar'     => _x( 'Відгуки', 'add new on admin bar', 'sudus' ),
			'add_new'            => _x( 'Додати відгук', 'actions', 'sudus' ),
			'add_new_item'       => __( 'Додати новий відгук', 'sudus' ),
			'new_item'           => __( 'Новиий відгук', 'sudus' ),
			'edit_item'          => __( 'Редагувати відгук', 'sudus' ),
			'view_item'          => __( 'Дивитись відгук', 'sudus' ),
			'all_items'          => __( 'Всі відгуки', 'sudus' ),
			'search_items'       => __( 'Шукати відгук', 'sudus' ),
			'parent_item_colon'  => __( 'Батько відгуку:', 'sudus' ),
			'not_found'          => __( 'Відгук не знайдено', 'sudus' ),
			'not_found_in_trash' => __( 'У кошику відгуків не знайдно', 'sudus' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'reviews' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'reviews' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'thumbnail')
		);

		register_post_type( 'reviews', $args );
	}

	add_action( 'init', 'reviews_post_type' );

	/**
	 * Register media post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since sudus 1.0
	 */

	function media_post_type() {

		$labels = array(
			'name'               => _x( 'Медіа про нас', 'post type general name', 'sudus' ),
			'singular_name'      => _x( 'Медіа про нас', 'post type singular name', 'sudus' ),
			'menu_name'          => _x( 'Медіа про нас', 'admin menu', 'sudus' ),
			'name_admin_bar'     => _x( 'Медіа про нас', 'add new on admin bar', 'sudus' ),
			'add_new'            => _x( 'Додати медіа', 'actions', 'sudus' ),
			'add_new_item'       => __( 'Додати нове медіа', 'sudus' ),
			'new_item'           => __( 'Нове медіа', 'sudus' ),
			'edit_item'          => __( 'Редагувати медіа', 'sudus' ),
			'view_item'          => __( 'Дивитись медіа', 'sudus' ),
			'all_items'          => __( 'Всі медіа', 'sudus' ),
			'search_items'       => __( 'Шукати медіа', 'sudus' ),
			'parent_item_colon'  => __( 'Батько медіа:', 'sudus' ),
			'not_found'          => __( 'Медіа не знайдено', 'sudus' ),
			'not_found_in_trash' => __( 'У кошику медіа не знайдно', 'sudus' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'media' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'media' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'thumbnail' )
		);

		register_post_type( 'media', $args );
	}

	add_action( 'init', 'media_post_type' );