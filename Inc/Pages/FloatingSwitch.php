<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\SettingsApi;

use Inc\Base\BaseController;

class FloatingSwitch extends BaseController
{
    public $callbacks;   // TO call the callbacks so make a variable
    public $subpages = array();

    public function register(){
//from here active with toogle
        $option = get_option(  'questionarie_based_filter' ); //get the id from option name
        $activate = isset($option['questionarie_floating_option']) ? $option['questionarie_floating_option']  : false; //this one is id from Basecontroller


        if( ! $activate){
            return;
        }

//from here active with toogle  end


        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'wp_head', array( $this, 'add_floating_template' ) );
    }

    public function enqueue()
    {
        wp_enqueue_style( 'authstyle', $this->plugin_url . 'assets/Public/floating-button.css' );
        wp_enqueue_script( 'authscript', $this->plugin_url . 'assets/floating-button.js' );
    }

    public function add_floating_template()
    {

        $file = require_once $this->plugin_path. 'templates/floating.php';

        if ( file_exists( $file ) ) {
            load_template( $file, true );
        }
    }

}
