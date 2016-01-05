<?php
/**
 * This file adds the FAQ Sample page template from the MediaCrazed FAQ Manager Plugin.
 *
 * @author MediaCrazed
 * @package MediaCrazed_FAQ_Manager
 * @subpackage Customizations
 */
/*
Template Name: FAQ Sample
*/
//* Add landing body class to the head
add_filter( 'body_class', 'faq_sample_add_body_class' );
function faq_sample_add_body_class( $classes ) {
	$classes[] = 'faq-sample';
	return $classes;
}
/**
 * Set Defaults in Display Posts Shortcode
 *
 * @param array $out, the output array of shortcode attributes (after user-defined and defaults have been combined)
 * @param array $pairs, the supported attributes and their defaults
 * @param array $atts, the user defined shortcode attributes
 * @return array $out, modified output
 */
function be_dps_defaults( $out, $pairs, $atts ) {
	$new_defaults = array( 
		'posts_per_page' => -1,
		'post_type' => mc_faq_post_type,
		'include_content' => true,
		'wrapper' => div, 
		'wrapper_class' => myfaq,
	);
	
	foreach( $new_defaults as $name => $default ) {
		if( array_key_exists( $name, $atts ) )
			$out[$name] = $atts[$name];
		else
			$out[$name] = $default;
	}
	
	return $out;
}
add_filter( 'shortcode_atts_display-posts', 'be_dps_defaults', 10, 3 );

//* Run the Genesis loop
genesis();
