<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://http://bit.ly/about-litvinov
 * @since      1.0.0
 *
 * @package    Orbit_Menu
 * @subpackage Orbit_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Orbit_Menu
 * @subpackage Orbit_Menu/admin
 * @author     Artem Litvinov <info@larpradeda.com.ua>
 */
class Orbit_Menu_Admin {

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

		add_action( 'admin_menu', array($this, 'orbit_menu_add_options_page') );

	}

	function orbit_menu_add_options_page() {
		$hook_suffix = add_menu_page( __('Orbit Menu Options', 'orbit-menu'), __('Orbit Menu', 'orbit-menu'), 'manage_options', 'orbit-menu-options', array($this, 'orbit_menu_create_page'), 'dashicons-sos' );

		add_action( "admin_print_scripts-{$hook_suffix}", array($this, 'orbit_menu_admin_scripts') );
		add_action( 'admin_init', array($this, 'orbit_menu_custom_setting') );
	}

	function orbit_menu_admin_scripts() {
		wp_enqueue_style( 'orbit-menu-main-style', plugin_dir_url( __FILE__ ) . 'css/orbit-menu-admin.css' );
		wp_enqueue_script( 'orbit-menu-main-script', plugin_dir_url( __FILE__ ) . 'js/orbit-menu-admin.js', array( 'jquery' ), false, true );
	}

	function orbit_menu_custom_setting() {
		register_setting( 'orbit_menu_general_group', 'orbit_menu_name_cat' );
		add_settings_section( 'orbit_menu_general_section', __('Add categories to Orbit', 'orbit-menu'), '', 'orbit-menu-options' );
		add_settings_field( 'name_cat', __('Category list', 'orbit-menu'), array($this, 'orbit_menu_add_categories'), 'orbit-menu-options', 'orbit_menu_general_section' );

	}

	function orbit_menu_create_page() {
			require plugin_dir_path( dirname(__FILE__) ) . 'admin/partials/orbit-menu-admin-display.php';
	}

	function orbit_menu_add_categories() {

		$val = 0;    //For checkbox, attr checked
		
		$options = get_option( 'orbit_menu_name_cat', [] );

		$checkbox_field_1 = isset( $options['field_1'] )
			? (array) $options['field_1'] : [];

		$categories = get_categories( [
			'taxonomy' => 'product_cat',
			'get' => 'all',
		] );


		if( $categories ){
			foreach( $categories as $cat ){
				$val = in_array( $cat->cat_ID, $checkbox_field_1);           

				echo '<div class="cat-item">';
				echo '<label for="' .$cat->slug. '"><input name="orbit_menu_name_cat[field_1][]" type="checkbox" id="' .$cat->slug. '" value="' .$cat->cat_ID. '"' . checked( 1, $val, false ) .' >' .$cat->name.' - ' .$cat->cat_ID. '</label>';
				echo '</div>';
			}
		}   
		
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
		 * defined in Orbit_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Orbit_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/orbit-menu-admin.css', array(), $this->version, 'all' );

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
		 * defined in Orbit_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Orbit_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/orbit-menu-admin.js', array( 'jquery' ), $this->version, false );

	}

}
