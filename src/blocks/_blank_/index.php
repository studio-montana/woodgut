<?php
/**
 * @package Woodkit
* @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
* License: GPL2
* Text Domain: woodkit
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

class WKG_Module_Block__blank_ extends WKG_Module_Block {

	function __construct() {
		parent::__construct('_blank_', array(
				'uri' => WOODGUT_PLUGIN_URI.'src/blocks/_blank_/', // must be explicitly defined to support symbolic link context
		));
	}

	public function render(array $attributes, $content) {
		ob_start ();
		// print_r($attributes);
		$id = isset($attributes['id']) ? str_replace('-', '', $attributes['id']) : uniqid('wkg');
		?>
		<div class="<?php echo $this->getFrontClasses(); ?>" id="<?php echo $id; ?>">
			TODO display block front content
		</div>
		<?php return ob_get_clean();
	}
}
new WKG_Module_Block__blank_();
