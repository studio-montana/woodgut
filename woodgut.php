<?php
/**
 * Plugin Name: Woodgut
 * Plugin URI: http://www.studio-montana.com/product/woodgut
 * Description: Multitool experience for WP | SEO, security, private area, tracking, legal, ...
 * Version: 2.0.0
 * Author: Studio Montana
 * Author URI: http://www.studio-montana.com/
 * License: GPL2
 * Text Domain: woodgut
 */

/**
 * Copyright 2016 Sébastien Chandonay (email : please contact me from my website)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
defined('ABSPATH') or die("Go Away!");

/**
 * Woodgut PLUGIN CONSTANTS
*/
define('WOODGUT_PLUGIN_FILE', __FILE__);
define('WOODGUT_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WOODGUT_PLUGIN_URI', plugin_dir_url(__FILE__));
define('WOODGUT_PLUGIN_WEB_CACHE_VERSION', '2.0.0');

/**
 * Woodgut PLUGIN DEFINITION
*/
if(!class_exists('Woodgut')){

	class Woodgut{

		private static $_this;

		/**
		 * Construct the plugin object
		 */
		public function __construct(){

			// Don't allow more than one instance of the class
			if (isset(self::$_this)) {
				wp_die(sprintf(esc_html__( '%s is a singleton class and you cannot create a second instance.', 'woodgut' ), get_class($this)));
			}
			self::$_this = $this;

			/** plugin textdomain */
			load_plugin_textdomain('woodgut', false, dirname( plugin_basename( __FILE__ ) ).'/lang/' );

			require_once (WOODGUT_PLUGIN_PATH.'src/helpers/index.php');
			require_once (WOODGUT_PLUGIN_PATH.'src/rest/commons.php');

			/** plugin install/uninstall hooks */
			register_activation_hook(__FILE__, array($this, 'activate'));
			register_deactivation_hook(__FILE__, array($this, 'deactivate'));

			/** Woodgut init */
			add_action('init', array($this, 'init'), 5);
		}

		/**
		 * Activate the plugin
		 */
		public function activate(){
			$this->tools->plugin_activation();
		}

		/**
		 * Deactivate the plugin
		 */
		public function deactivate(){
			$this->tools->plugin_deactivation();
		}

		public static function get_info($name){
			$plugin_data = get_plugin_data(__FILE__);
			return $plugin_data[$name];
		}

		/**
		 * Init
		 */
		public function init() {
			do_action("woodgut_before_init");
			do_action("woodgut_after_init");
		}

	}

}

if(class_exists('Woodgut')){

	// instantiate the plugin class
	$GLOBALS['woodgut'] = new Woodgut();
}
