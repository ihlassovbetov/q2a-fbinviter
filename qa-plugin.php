<?php

/*
	Plugin Name: FBinvite
	Plugin Description: Invite your facebook friends to q2a.
	Plugin Version: 1.0
	Plugin Date: 05/09/2017
	Plugin Author: Yhlas Sovbetov
	Plugin Author URI: E-Dostluk Group www.e-dostluk.com / gyzgyn.e-dostluk.com
	Plugin License: GPLv3
	Plugin Tested on: Q2A 1.7.4
	
	This program is free software. You can redistribute and modify it 
	under the terms of the GNU General Public License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.gnu.org/licenses/gpl.html

*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
			header('Location: ../../');
			exit;
	}
	qa_register_plugin_layer('qa-fbinvite-layer.php', 'FBinvite Layer');	
		
	qa_register_plugin_module('module', 'qa-fbinvite-admin.php', 'qa_fbinvite_admin', 'FBinvite Admin');

	qa_register_plugin_module('widget', 'qa-fbinvite-widget.php', 'qa_fbinvite_widget', 'FBinvite Widget');

/*
	Omit PHP closing tag to help avoid accidental output
*/
