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

class qa_html_theme_layer extends qa_html_theme_base {

	function head_custom()
	{
		parent::head_custom();

		$hidecss = qa_opt('fbinvite_plugin_widget_hidecss') === '1';

		if ( !$hidecss )
		{
			$fb_css = '
				<style>
				.fbinvite-widget-gyzgyn {text-align: center;}
				.fbinvite-widget-gyzgyn h2 {text-align: left;}
				input#qa_fb_invite {background-color: #eee; cursor: pointer;border: 1px solid #cecece;}
				input#qa_fb_invite:hover {background: #3c5a98; color: #fff;}
				</style>';

			$this->output_raw( $fb_css );
		}
	}
		
}
	
