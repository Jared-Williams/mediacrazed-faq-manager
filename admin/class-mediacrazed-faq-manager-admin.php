<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.mediacrazed.com
 * @since      1.0.0
 *
 * @package    Mediacrazed_Faq_Manager
 * @subpackage Mediacrazed_Faq_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mediacrazed_Faq_Manager
 * @subpackage Mediacrazed_Faq_Manager/admin
 * @author     MediaCrazed <jared@mediacrazed.com>
 */
class Mediacrazed_Faq_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mediacrazed_Faq_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mediacrazed_Faq_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mediacrazed-faq-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mediacrazed_Faq_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mediacrazed_Faq_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mediacrazed-faq-manager-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the FAQ Custom Post Type for the admin area.
	 *
	 * @since    1.0.0
	 */

	// Register Custom Post Type
	public function mc_faq_custom_post_type() {

		if ( ! function_exists('mc_faq_custom_post_type') ) {

			$labels = array(
				'name'                  => _x( 'FAQs', 'Post Type General Name', 'text_domain' ),
				'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'text_domain' ),
				'menu_name'             => __( 'FAQs', 'text_domain' ),
				'name_admin_bar'        => __( 'FAQ', 'text_domain' ),
				'archives'              => __( 'FAQ Archives', 'text_domain' ),
				'parent_item_colon'     => __( 'Parent FAQ:', 'text_domain' ),
				'all_items'             => __( 'All FAQs', 'text_domain' ),
				'add_new_item'          => __( 'Add New FAQ', 'text_domain' ),
				'add_new'               => __( 'Add New', 'text_domain' ),
				'new_item'              => __( 'New FAQ', 'text_domain' ),
				'edit_item'             => __( 'Edit FAQ', 'text_domain' ),
				'update_item'           => __( 'Update FAQ', 'text_domain' ),
				'view_item'             => __( 'View FAQ', 'text_domain' ),
				'search_items'          => __( 'Search FAQ', 'text_domain' ),
				'not_found'             => __( 'Not found', 'text_domain' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
				'featured_image'        => __( 'Featured Image', 'text_domain' ),
				'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
				'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
				'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
				'insert_into_item'      => __( 'Insert into FAQ', 'text_domain' ),
				'uploaded_to_this_item' => __( 'Uploaded to this FAQ', 'text_domain' ),
				'items_list'            => __( 'FAQs list', 'text_domain' ),
				'items_list_navigation' => __( 'FAQs list navigation', 'text_domain' ),
				'filter_items_list'     => __( 'Filter FAQs list', 'text_domain' ),
			);
			$rewrite = array(
				'slug'                  => 'faq',
				'with_front'            => true,
				'pages'                 => true,
				'feeds'                 => true,
			);
			$args = array(
				'label'                 => __( 'FAQ', 'text_domain' ),
				'description'           => __( 'FAQ Manager from MediaCrazed', 'text_domain' ),
				'labels'                => $labels,
				'supports'              => array( 'title', 'editor', ),
				'taxonomies'            => array( 'category', 'post_tag' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-editor-help',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => 'faqs',
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'rewrite'               => $rewrite,
				'capability_type'       => 'post',
			);
			register_post_type( 'mc_faq_post_type', $args );

		}
		add_action( 'init', 'mc_faq_custom_post_type' );

	}
	
}
