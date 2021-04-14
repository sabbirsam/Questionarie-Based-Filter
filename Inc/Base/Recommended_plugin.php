<?php
 /**
  * @package  questionarie-based-filter
  */

namespace Inc\Base;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Base\BaseController;


class Recommended_plugin extends BaseController
 {
     public $callbacks;   // TO call the callbacks so make a variable
     public $subpages = array();


     public function register()
     {


         if ( ! $this->activated( 'questionarie_recommended_plugin' ) ) return;


         $this->settings = new SettingsApi();

         $this->callbacks = new AdminCallbacks();  //call admin callback using callback variable

         $this->setSubpages();

         $this->settings->addSubPages( $this->subpages )->register();



     }

     public function setSubpages()
     {
         $this->subpages = array(
             array(
                 'parent_slug' => 'questionarie_based_filter',
                 'page_title' => 'Recommended Plugin',
                 'menu_title' => 'Recommended Plugin',
                 'capability' => 'manage_options',
                 'menu_slug' => 'questionarie_recommended_plugin',
                 'callback' => array( $this->callbacks, 'recommendedPlugin' ), //adminCallback.php
             )
         );
     }
 }


