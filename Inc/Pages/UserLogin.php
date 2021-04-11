<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\SettingsApi;

use Inc\Base\BaseController;

class UserLogin extends BaseController
{
    public $callbacks;   // TO call the callbacks so make a variable
    public $subpages = array();

    public function register(){
//from here active with toogle
        $option = get_option(  'questionarie_based_filter' ); //get the id from option name
        $activate = isset($option['questionarie_login']) ? $option['questionarie_login']  : false; //this one is id from Basecontroller


        if( ! $activate){
            return;
        }

//from here active with toogle  end


        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'wp_head', array( $this, 'add_auth_template' ) );
        add_action( 'wp_ajax_nopriv_qba_login', array( $this, 'login' ) );
    }

    public function enqueue()
    {
        wp_enqueue_style( 'authstyle', $this->plugin_url . 'assets/Public/auth.css' );
        wp_enqueue_script( 'authscript', $this->plugin_url . 'assets/Public/auth.js' );
    }


    public function add_auth_template()
    {
//        if ( is_user_logged_in() ) return;

        $file = require_once $this->plugin_path. 'templates/auth.php';

        if ( file_exists( $file ) ) {
            load_template( $file, true );
        }
    }

    public function login()
    {
        check_ajax_referer( 'ajax-login-nonce', 'qba_auth');

        $info = array();
        $info['user_login'] = $_POST['username'];
        $info['user_password'] = $_POST['password'];
        $info['remember'] =true;

        $user_signon = wp_signon( $info, false );

        if ( is_wp_error( $user_signon) ) {
            echo json_encode(
                array(
                    'status' => false,
                    'message' => 'Wrong username or password'
                )
            );

            die();
        }

        echo json_encode(
            array(
                'status' => true,
                'message' => 'Login successful, redirecting...'
            )
        );

        die();
    }
}

