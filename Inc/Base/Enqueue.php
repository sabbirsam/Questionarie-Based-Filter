<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Base;
use \Inc\Base\BaseController;


class Enqueue extends BaseController
{

    public function register(){
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) ); //1
        add_action( 'wp_enqueue_scripts', array( $this, 'public_enqueue' ) ); //2
    }

    public function admin_enqueue() {   //1
        // enqueue all our scripts

            wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/Admin/mystyle.css');
            wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/Admin/myscript.js');

    }
    //Public css and js linked
    public function public_enqueue() {  //2
        // enqueue all our scripts

            wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/Public/public.css');
            wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/Public/public.js');

    }


}