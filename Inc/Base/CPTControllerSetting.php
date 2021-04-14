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

        if (! $this->activated('questionarie_cpt')) return ;


        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();  //call admin callback using callback variable

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();

        add_action( 'admin_enqueue_scripts', array( $this, 'admin_question_enqueue' ) );


    }

    public function admin_question_enqueue($screen){
       /* echo "<pre>";
        print_r($screen); //qbf_page_questionarie_based_filter_cqbf
        echo "</pre>";
        end();*/

        if('qbf_page_questionarie_based_filter_cqbf' == $screen ){
        wp_enqueue_style('questionarie_main_part_style', $this->plugin_url . 'assets/Admin/create_ques.css');
        wp_enqueue_script('questionarie_main_part_js', $this->plugin_url . 'assets/Admin/create_ques.js');

        }

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
