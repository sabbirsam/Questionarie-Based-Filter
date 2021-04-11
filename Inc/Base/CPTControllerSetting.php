<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Base;
use Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;



class CPTControllerSetting extends BaseController
{
    public $callbacks;   // TO call the callbacks so make a variable
    public $subpages = array();


    public function register()
    {

        /*check if active or not*/

        $option = get_option(  'questionarie_based_filter' ); //get the id from option name
        $activate = isset($option['questionarie_cpt']) ? $option['questionarie_cpt']  : false; //this one is id from Basecontroller

        /*var_dump($activate);*/

        if( ! $activate){
            return;
        }


        /*check if active or not end */

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
                'page_title' => 'Create Questionaries',
                'menu_title' => 'Create Questionaries',
                'capability' => 'manage_options',
                'menu_slug' => 'questionarie_based_filter_cqbf',
                'callback' => array( $this->callbacks, 'createQuestionaries' ), //adminCallback.php
            )
        );
    }
}
