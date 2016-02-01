<?php
/**
 * Link Hover Effect Shortcode
 *
 * @package   Link Hover Effect Shortcode
 * @author    Bryan Willis <bryanwillis1@gmail.com>
 * @license   GPL-2.0+
 * @link      http://wordpress.stackexchange.com/q/216171/43806
 *
 * @wordpress-plugin
 * Plugin Name:       Hovereffect Shortcode
 * Plugin Script:     hovereffect-shortcode
 * Plugin URI:        
 * Description:       Adds a hover effect shortcode for links
 * Version:           0.1
 * Author:            Bryan Willis
 * Author URI:        http://profiles.wordpress.org/codecandid
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
function bw_hovereffect_scripts() {
 wp_register_style( 'hovereffect', plugins_url( '/hovereffect.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'bw_hovereffect_scripts' );

function bw_hovereffect_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'text' => get_the_title(),,
			'url' => get_post_permalink(),
		), $atts, 'hovereffect' );
	 wp_enqueue_style('hovereffect');
	return '<a class="hovereffect" href="'.esc_attr($atts['url']).'"><span title="'.$atts['text'].'">'.$atts['text'].'</span></a>';
}
add_shortcode( 'hovereffect', 'bw_hovereffect_shortcode' );
