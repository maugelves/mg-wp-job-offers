<?php


/**
*	Load the TextDomain for the plugin in the '/languages' folder
*	
*	Remember the files should be <plugin-slu>-<locale>.mo
*	e.g. my-books-en_US.mo
*/
function mgjo_after_theme_setup(){
	load_plugin_textdomain(MGJO_TDOMAIN,false, MGJO_FOLDER . '/languages');
}
add_action('plugins_loaded', 'mgjo_after_theme_setup');



/**
* In order to make the ACF labels translatable we must
* set this filters.
*/
function mgjo_acf_settings_localization($localization){
	return true;
}
add_filter('acf/settings/l10n', 'mgjo_acf_settings_localization');

function mgjo_acf_settings_textdomain($domain){
	return MGJO_TDOMAIN;
}
add_filter('acf/settings/l10n_textdomain', 'mgjo_acf_settings_textdomain');
/* ======================================================================== */





/**
 * Check the plugin dependencies
 */
function check_plugin_dependencies() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'         => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://www.advancedcustomfields.com/pro/', // If set, overrides default API URL and points to an external URL.
		),
	);

	tgmpa( $plugins );

}
add_action( 'tgmpa_register', 'check_plugin_dependencies' );