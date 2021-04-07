<?php
/**
 * @package  questionarie-based-filter
 */
/*
Plugin Name: Questionarie Based Filter
Plugin URI: http://techsambd.com
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author: WPPOOL
Author URI: http://wppool.dev
License: GPLv2 or later
Text Domain: questionarie_based_filter
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
/*
define( 'PLUGIN_PATH', plugin_dir_path(__FILE__)); // for add php file
define( 'PLUGIN_URL', plugin_dir_url(__FILE__));  //for css, js
define( 'PLUGIN_SETTING_LINK', plugin_basename(__FILE__));  //For Setting

*/


//Activate and Deactivate
//use Inc\Base\Activate;
//use Inc\Base\Deactivate;

function activate_questionarie_based_filter() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__,  'activate_questionarie_based_filter' );



function deactivate_questionarie_based_filter() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__,'deactivate_questionarie_based_filter'  );


if ( class_exists( 'Inc\\Init')){
    Inc\Init::register_services();
}