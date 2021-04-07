<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Setting extends BaseController
{


    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {  //4
//        $settings_link = '<a href="admin.php?page=sabbir_plugin">SAM Settings</a>';  // for single use it this way
       $settings_link = array(
           '<a href="admin.php?page=questionarie_based_filter">Create Questionarie</a>',
           '<a href="admin.php?page=questionarie_based_filter">Settings</a>',
        );

//        array_push( $links, $settings_link );   // for sinle use this
        return array_merge($links, $settings_link);
    }

}