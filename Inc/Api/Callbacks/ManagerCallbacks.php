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
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return ( isset($input) ? true : false );
    }

    public function questionarieAdminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }

    public function questionariecheckboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option( $name );

        echo '<div><label class="' . $classes . '" for="' . $name . '">
                    <input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '>
                    <i></i>
                    </label></div>';

       /* echo'<div>
                <lable class="" for="">
                    <input type="checkbox" id="" name="" value="1" class="">
                    <i></i>

                </lable>

            </div>';*/


    }


}