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

    public function settings()
    {
        return require_once( "$this->plugin_path/templates/settings.php" );
    }

}