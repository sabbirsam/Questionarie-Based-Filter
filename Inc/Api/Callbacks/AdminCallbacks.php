<?php
/**
 * @package  questionarie-based-filter
 */


namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function createQuestionaries()
    {
        return require_once( "$this->plugin_path/templates/create_question.php" );
    }

    /**
     * @return mixed
     */

    public function settings()
    {
        return require_once( "$this->plugin_path/templates/settings.php" );
    }

    /**
     * @param $input
     * @return mixed
     * it used to add field
     */
/*    public function questionarieOptionsGroup($input) //here used
    {
        return $input;
    }

    public function questionarieAdminSection() //here used
    {
        echo "Hello from AdminCallback.php and triggered from admin.php SetSection()";
    }*/


    public function questionarieGmailInput() //here used
    {
        $value = esc_attr( get_option( 'questionarie_gmail' ) );
        echo '<input type="text" class="regular-text" name="questionarie_gmail" value="' . $value . '" placeholder="Gmail here!">';

    }


    public function questionariePasswordInput() //here used
    {
        $value = esc_attr( get_option( 'questionarie_password' ) );
        echo '<input type="text" class="regular-text" name="questionarie_password" value="' . $value . '" placeholder="Password here!">';

    }

}