<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Pages;
class UserLogin
{
    public function register(){
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'wp_head', array( $this, 'add_auth_template' ) );
        add_action( 'wp_ajax_nopriv_qba_login', array( $this, 'login' ) );
    }

    public function enqueue()
    {
        wp_enqueue_style( 'authstyle', PLUGIN_URL . 'assets/auth.css' );
        wp_enqueue_script( 'authscript', PLUGIN_URL . 'assets/auth.js' );
    }

    public function add_auth_template()
    {
        if ( is_user_logged_in() ) return;

        $file = require_once PLUGIN_PATH. 'templates/auth.php';

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
