<?php
/**
 * @package Woodgut
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 * License: GPL2
 * Text Domain: woodgut
 * 
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

if (!class_exists('WOODGUTGUTEN')) {

	define('WOODGUTGUTEN_SRC_PATH', WOODGUT_PLUGIN_PATH.WOODGUT_PLUGIN_GUTENBERG_FOLDER);
	define('WOODGUTGUTEN_SRC_URI', WOODGUT_PLUGIN_URI.WOODGUT_PLUGIN_GUTENBERG_FOLDER);

	/**
	 * This class is Gutenberg Woodgut support entry point,
	 * it enables and improves tool's Gutenberg modules developments
	 */
	class WOODGUTGUTEN{
		
		/**
		 * woodgutguten : zone Gutenberg pour Woodgut
		 * Namespace : wkg
		 * Prefix : wkg_
		 */

		public function __construct(){

			/** Helpers */
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/helpers/index.php');

			/** Rest api */
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/rest/index.php');

			/** Main classes */
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/module.class.php');
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/module-block.class.php');
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/module-plugin.class.php');
			require_once (WOODGUTGUTEN_SRC_PATH.'inc/module-store.class.php');
			
			/** Main stores */
			require_once (WOODGUTGUTEN_SRC_PATH.'stores/commons/index.php');

			/** admin scripts / styles */
			add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
		}

		/**
		 * Enqueue global styles and scripts
		 */
		public function admin_scripts () {
			// Skip if Gutenberg is not enabled/merged.
			if (!function_exists('register_block_type')) {
				return;
			}
			// Enqueue Editor styles
			$style_uri = WOODGUTGUTEN_SRC_URI . 'assets-css/editor.css';
			$style_path = WOODGUTGUTEN_SRC_PATH . 'assets-css/editor.css';
			wp_enqueue_style('wkg-general-editor', $style_uri, array(), filemtime($style_path));
		}
	}

	/**
	 * Instantiate
	 */
	$GLOBALS['wkg'] = new WOODGUTGUTEN();
}
