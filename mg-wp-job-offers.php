<?php
/*
Plugin Name: MG WP Job Offers
Plugin URI:  https://github.com/maugelves/mg-wp-job-offers
Description: WordPress plugin to manage Job offers
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mg-wp-job-offers
Domain Path: /languages
*/

// CONSTANTS
define( 'MGJO_TDOMAIN', 'mg-wp-job-offers');
define( 'MGJO_PATH', dirname( __FILE__ ) );
define( 'MGJO_FOLDER', basename( MGJO_PATH ) );
define( 'MGJO_URL', plugins_url() . '/' . MGJO_FOLDER );


/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGJO_PATH . "/inc/libs/class-tgm-plugin-activation.php" );



/*
*   =================================================================================================
*   CONFIG FUNCTIONS
*   =================================================================================================
*/
include ( MGJO_PATH . "/inc/config.php" );





/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGJO_PATH . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGJO_PATH . "/inc/acfs/*.php") as $filename)
	include $filename;