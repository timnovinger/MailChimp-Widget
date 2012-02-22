<?php
/*
Plugin Name: MailChimp Widget
Plugin URI: https://github.com/timnovinger/MailChimp-Widget
Description: This plugin is the same as James Lafferty's 0.7.1 version, but modified to continue to display the widget after the user successfully signs up.
Author: James Lafferty, Tim Novinger
Version: 0.7.2
Author URI: https://github.com/timnovinger/MailChimp-Widget
License: GPL2
*/

/*  Copyright 2010  James Lafferty  (email : james@nearlysensical.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Set up the autoloader.
 */

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/lib/'));

spl_autoload_extensions('.class.php');

if (! function_exists('buffered_autoloader')) {

	function buffered_autoloader ($c) {

		try {

			spl_autoload($c);

		} catch (Exception $e) {

			$message = $e->getMessage();

			return $message;

		}


	}

}

spl_autoload_register('buffered_autoloader');

/**
 * Get the plugin object. All the bookkeeping and other setup stuff happens here.
 */

$ns_mc_plugin = NS_MC_Plugin::get_instance();

register_deactivation_hook(__FILE__, array(&$ns_mc_plugin, 'remove_options'));

?>
