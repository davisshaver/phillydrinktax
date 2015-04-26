<?php

	/** Make sure Timber is loaded for the frontend */
		if (!class_exists('Timber')){
			add_action( 'admin_notices', function(){
				echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
			});
			return;
		}


	/** Setup Today */
		class drinks extends TimberSite {

			function __construct(){
				add_theme_support('post-thumbnails');
				add_theme_support('menus');
				add_action('init', array($this, 'register_post_types'));
				add_action('init', array($this, 'register_taxonomies'));
				add_action( 'admin_menu', array($this, 'remove_unusued_post_types_menu_items' ));
				add_filter('show_admin_bar', '__return_false');
				add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts' ) );
				remove_action ('wp_head', 'rsd_link');
				remove_action ('wp_head', 'wlwmanifest_link');
				remove_action ('wp_head', 'wp_generator');
				add_filter( 'load_default_widgets', '__return_false' );
				add_filter('excerpt_more', 'new_excerpt_more');
				parent::__construct();
			}

			function register_post_types(){
				}


			function remove_unusued_post_types_menu_items() {

			}


			function register_taxonomies(){
				//this is where you can register custom taxonomies
			}

			function action_wp_enqueue_scripts() {
				wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), false, 'all' );
				wp_enqueue_style( 'drinks', get_template_directory_uri() . '/css/drinks.css', array(), false, 'all' );
				wp_enqueue_style( 'component', get_template_directory_uri() . '/css/component.css', array(), false, 'all' );
				wp_enqueue_style( 'cs-select', get_template_directory_uri() . '/css/cs-select.css', array(), false, 'all' );
				wp_enqueue_style( 'cs-skin-boxes', get_template_directory_uri() . '/css/cs-skin-boxes.css', array(), false, 'all' );

				wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), false, false );
				wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), false, true );
				wp_enqueue_script( 'selectfx', get_template_directory_uri() . '/js/selectFx.js', array(), false, true );
				wp_enqueue_script( 'fullscreenform', get_template_directory_uri() . '/js/fullscreenForm.js', array(), false, true );
			}

		}

	/* Initiate today */
		new drinks();
