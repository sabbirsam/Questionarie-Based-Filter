<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Base;

class Setting
{
    protected $sam_plugin;

    public function __construct()
    {
        $this->sam_plugin = PLUGIN_SETTING_LINK;
    }

    public function register()
    {
        add_filter( "plugin_action_links_$this->sam_plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {  //4
//        $settings_link = '<a href="admin.php?page=sabbir_plugin">SAM Settings</a>';  // for single use it this way
       $settings_link = array(
           '<a href="admin.php?page=qbs_plugin">Create Questionarie</a>',
           '<a href="admin.php?page=qbs_plugin">Settings</a>',
        );

//        array_push( $links, $settings_link );   // for sinle use this
        return array_merge($links, $settings_link);
    }

}