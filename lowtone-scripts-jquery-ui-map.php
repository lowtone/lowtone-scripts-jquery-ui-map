<?php
/*
 * Plugin Name: Script Library: jQuery UI Google Map
 * Plugin URI: http://wordpress.lowtone.nl/scripts-jquery-ui-map
 * Plugin Type: lib
 * Description: Include the jQuery UI Google Map library by Johan Säll Larsson.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://www.opensource.org/licenses/mit-license.php
 */

namespace lowtone\scripts\jquery\ui\map {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_jquery_ui_map"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				$dependencies = array(
						"jquery-ui-map" => array("jquery"),
						"jquery-ui-map-extensions" => array("jquery-map"),
						"jquery-ui-map-microdata" => array("jquery-map"),
						"jquery-ui-map-microformat" => array("jquery-map"),
						"jquery-ui-map-overlays" => array("jquery-map"),
						"jquery-ui-map-rdfa" => array("jquery-map"),
						"jquery-ui-map-services" => array("jquery-map"),
					);

				$versions = array(
						"jquery-ui-map" => "3.0-rc",
						"jquery-ui-map-extensions" => "3.0-rc",
						"jquery-ui-map-microdata" => "3.0-beta",
						"jquery-ui-map-microformat" => "3.0-alpha",
						"jquery-ui-map-overlays" => "3.0-rc",
						"jquery-ui-map-rdfa" => "3.0-beta",
						"jquery-ui-map-services" => "3.0-rc",
					);

				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", $dependencies, $versions)
					);
			}
		));

	function registered() {
		global $lowtone_scripts_jquery_ui_map;
		
		return isset($lowtone_scripts_jquery_ui_map["registered"]) ? $lowtone_scripts_jquery_ui_map["registered"] : false;
	}
	
}