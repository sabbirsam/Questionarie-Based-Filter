<?php
/**
 * @package  questionarie-based-filter
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );  // for add php file
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );  //for css, js
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/questionnaire-based-filter.php';  //For Setting
    }
}