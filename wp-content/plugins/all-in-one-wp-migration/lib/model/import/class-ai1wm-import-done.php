<?php
/**
 * Copyright (C) 2014-2017 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wm_Import_Done {

	public static function execute( $params ) {

		// Set shutdown handler
		@register_shutdown_function( 'Ai1wm_Import_Done::shutdown' );

		// Check multisite.json file
		if ( true === is_file( ai1wm_multisite_path( $params ) ) ) {

			// Read multisite.json file
			$handle = ai1wm_open( ai1wm_multisite_path( $params ), 'r' );

			// Parse multisite.json file
			$multisite = ai1wm_read( $handle, filesize( ai1wm_multisite_path( $params ) ) );
			$multisite = json_decode( $multisite, true );

			// Close handle
			ai1wm_close( $handle );

			// Activate sitewide plugins
			if ( isset( $multisite['Plugins'] ) && ( $plugins = $multisite['Plugins'] ) ) {
				ai1wm_activate_plugins( $plugins );
			}
		} else {

			// Check package.json file
			if ( true === is_file( ai1wm_package_path( $params ) ) ) {

				// Read package.json file
				$handle = ai1wm_open( ai1wm_package_path( $params ), 'r' );

				// Parse package.json file
				$package = ai1wm_read( $handle, filesize( ai1wm_package_path( $params ) ) );
				$package = json_decode( $package, true );

				// Close handle
				ai1wm_close( $handle );

				// Activate plugins
				if ( isset( $package['Plugins'] ) && ( $plugins = $package['Plugins'] ) ) {
					ai1wm_activate_plugins( $plugins );
				}
			}
		}

		// Check blogs.json file
		if ( true === is_file( ai1wm_blogs_path( $params ) ) ) {

			// Read blogs.json file
			$handle = ai1wm_open( ai1wm_blogs_path( $params ), 'r' );

			// Parse blogs.json file
			$blogs = ai1wm_read( $handle, filesize( ai1wm_blogs_path( $params ) ) );
			$blogs = json_decode( $blogs, true );

			// Close handle
			ai1wm_close( $handle );

			// Activate plugins
			foreach ( $blogs as $blog ) {
				if ( isset( $blog['New']['Plugins'] ) && ( $plugins = $blog['New']['Plugins'] ) ) {
					ai1wm_activate_plugins( $plugins );
				}
			}
		}

		return $params;
	}

	public static function shutdown() {

		// Set progress
		Ai1wm_Status::done(
			sprintf(
				__(
					'You need to perform two more steps:<br />' .
					'<strong>1. You must save your permalinks structure twice. <a class="ai1wm-no-underline" href="%s" target="_blank">Permalinks Settings</a></strong> <small>(opens a new window)</small><br />' .
					'<strong>2. <a class="ai1wm-no-underline" href="https://wordpress.org/support/view/plugin-reviews/all-in-one-wp-migration?rate=5#postform" target="_blank">Optionally, review the plugin</a>.</strong> <small>(opens a new window)</small>',
					AI1WM_PLUGIN_NAME
				),
				admin_url( 'options-permalink.php#submit' )
			),
			__(
				'Your data has been imported successfuly!',
				AI1WM_PLUGIN_NAME
			)
		);
	}
}
