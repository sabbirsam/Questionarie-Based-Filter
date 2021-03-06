<?php
/**
 * @package  questionarie-based-filter
 */


namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    /**
     * @param $input
     * @return mixed
     * it used to add field
     */
    public function questionariecheckboxSanitizer($input) //here used
    {
        $output = array();

        foreach ( $this->managers as $key=> $value){
            $output[$key] = isset($input[$key]) ? true : false ;
        }
        return $output;

    }

    public function questionarieAdminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }

    public function questionariecheckboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option(  $option_name );
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div><label class="' . $classes . '" for="' . $name . '">
                    <input type="checkbox" id="' . $name . '" name="'.$option_name .'['. $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '>
                    <i></i>
                    </label></div>';
    }
}