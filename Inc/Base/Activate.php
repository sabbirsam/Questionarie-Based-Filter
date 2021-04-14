<?php
/**
 * @package  questionarie-based-filter
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

        if ( get_option( 'questionarie_based_filter' ) ) {
            return;
        }

        $default = array();

        update_option( 'questionarie_based_filter', $default );

	}

}