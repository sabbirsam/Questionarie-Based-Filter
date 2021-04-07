<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;   // TO call the callbacks so make a variable

    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();  //call admin callback using callback variable

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'QBF Plugin',
                'menu_title' => 'QBF',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-buddicons-topics',
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'questionarie_based_filter',
                'page_title' => 'Create Questionaries',
                'menu_title' => 'Create Questionaries',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter_cqbf',
                'callback' => array( $this->callbacks, 'createQuestionaries' ),
            ),
            array(
                'parent_slug' => 'questionarie_based_filter',
                'page_title' => 'Setting',
                'menu_title' => 'Setting',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter_setting',
                'callback' => array( $this->callbacks, 'settings' ),
            )
        );
    }
}




//OLD ONE=================================================================================================
    /*public $settings;

    public $pages = array();

    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'QBF Plugin',
                'menu_title' => 'QBF',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter',
                'callback' => function() { echo '<h1>questionarie-based-filter</h1>'; },
                'icon_url' => 'dashicons-buddicons-topics',
                'position' => 110
            )
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'questionarie_based_filter',
                'page_title' => 'Create Questionaries',
                'menu_title' => 'Create Questionaries',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter_cqbf',
                'callback' => function() { echo '<h1>Create Questionaries</h1>'; }
            ),
            array(
                'parent_slug' => 'questionarie_based_filter',
                'page_title' => 'Setting',
                'menu_title' => 'Setting',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter_setting',
                'callback' => function() { echo '<h1>Setting</h1>'; }
            )
        );
    }

    public function register()
    {
        $this->settings->addPages( $this->pages )->withSubPage( '' )->addSubPages( $this->subpages )->register();
    }*/

/*
 * namespace Inc\Pages;
 * class Admin
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

*/
//OLD ONE=================================================================================================