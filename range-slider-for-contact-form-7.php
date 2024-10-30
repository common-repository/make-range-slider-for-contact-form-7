<?php
/*
  Plugin Name: Range Slider For Contact Form 7
  Description: This plugin allows create Range slider Field For Contact Form 7 plugin.
  Version: 1.0
  Copyright: 2023
  Text Domain: range-slider-for-contact-form-7
*/

if (!defined('ABSPATH')) {
  die('-1');
}


// define for base name
if (!defined('RSFCF7_BASE_NAME')) {
  define('RSFCF7_BASE_NAME', plugin_basename(__FILE__));
}

// define for plugin file
if (!defined('RSFCF7_plugin_file')) {
  define('RSFCF7_plugin_file', __FILE__);
}

// define for plugin dir path
if (!defined('RSFCF7_PLUGIN_DIR')) {
  define('RSFCF7_PLUGIN_DIR',plugin_dir_path(__FILE__));
}
if (!defined('RSFCF7_PLUGIN_URL')) {
  define('RSFCF7_PLUGIN_URL',plugins_url('', __FILE__));
}

// Include function files
include_once(RSFCF7_PLUGIN_DIR.'includes/frontend.php');
include_once(RSFCF7_PLUGIN_DIR.'includes/admin.php');

function RSFCF7_load_script_style(){
  wp_enqueue_script( 'jquery-slider', RSFCF7_PLUGIN_URL . '/public/js/rsfcf7_rSlider.min.js', array('jquery'), '1.0');
  wp_enqueue_script( 'jquery-sliders', RSFCF7_PLUGIN_URL. '/public/js/design.js', array('jquery'), '1.0');
  wp_localize_script( 'jquery-slider', 'slider_ajax', array( 'ajax_urla' => RSFCF7_PLUGIN_URL) );
  wp_enqueue_style( 'jquery-slider-style', RSFCF7_PLUGIN_URL. '/public/css/rsfcf7_rSlider.min.css', '', '1.0' );
}
add_action( 'wp_enqueue_scripts', 'RSFCF7_load_script_style' );