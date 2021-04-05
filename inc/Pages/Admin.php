<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Pages;
class Admin
{
    public function register(){
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }

    public function add_admin_pages(){  //3   then it has 3-1 see below
        add_menu_page( 'Questionarie Based Filter Plugin', 'QBS', 'manage_options', 'qbs_plugin', array( $this, 'admin_index_design' ), 'dashicons-store', 110 );

    }

    public function admin_index_design(){ //3-1
        //require template
        require_once PLUGIN_PATH. 'templates/admin.php';

    }
}