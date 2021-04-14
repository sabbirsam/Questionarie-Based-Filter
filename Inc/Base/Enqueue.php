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
//        add_action( 'admin_enqueue_scripts', array( $this, 'questionaries_enqueue' ) ); //2

    }

    /*echo "<pre>";
       print_r($_currentScreen);
       echo "</pre>";
       die();
       var_dump($_currentScreen); */

    /* $currentScreen->id === "widgets" */


  /*  public function admin_enqueue($screen) {   //1
        // enqueue all our scripts
        $_currentScreen = get_current_screen();

        if('admin.php' == $screen && 'toplevel_page_questionarie_based_filter' == $_currentScreen->page) {
            wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/Admin/mystyle.css');
            wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/Admin/myscript.js');
        }
    }*/


    public function admin_enqueue($screen) {   //1
        // enqueue all our scripts

       /*  echo "<pre>";
       print_r($screen); //toplevel_page_questionarie_based_filter
       echo "</pre>";
       end();*/

        if('toplevel_page_questionarie_based_filter' == $screen ){
            wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/Admin/mystyle.css');
            wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/Admin/myscript.js');

        }
    }



    //Public css and js linked
    public function public_enqueue() {  //2
        // enqueue all our scripts

            wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/Public/public.css');

            wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/Public/public.js');


    }

    /*public function questionaries_enqueue(){
        wp_enqueue_style( 'questionarie_main_style', $this->plugin_url . 'assets/Admin/create_ques.css' );
        wp_enqueue_script( 'questionarie_main_js', $this->plugin_url . 'assets/Admin/create_ques.js' );

    }*/


}