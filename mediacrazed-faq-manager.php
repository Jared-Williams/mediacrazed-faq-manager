<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.mediacrazed.com
 * @since             1.0.0
 * @package           Mediacrazed_Faq_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       MediaCrazed FAQ Manager
 * Plugin URI:        https://github.com/Jared-Williams/mediacrazed-faq-manager
 * Description:       Provides a simple Custom Post Type to manage FAQs for clients. 
 * Version:           1.1.2
 * Author:            MediaCrazed
 * Author URI:        http://www.mediacrazed.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mediacrazed-faq-manager
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Jared-Williams/mediacrazed-faq-manager
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mediacrazed-faq-manager-activator.php
 */
function activate_mediacrazed_faq_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mediacrazed-faq-manager-activator.php';
	Mediacrazed_Faq_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mediacrazed-faq-manager-deactivator.php
 */
function deactivate_mediacrazed_faq_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mediacrazed-faq-manager-deactivator.php';
	Mediacrazed_Faq_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mediacrazed_faq_manager' );
register_deactivation_hook( __FILE__, 'deactivate_mediacrazed_faq_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mediacrazed-faq-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mediacrazed_faq_manager() {

	$plugin = new Mediacrazed_Faq_Manager();
	$plugin->run();

}
run_mediacrazed_faq_manager();
