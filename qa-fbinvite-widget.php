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

class qa_fbinvite_widget {
	
	var $urltoroot;

	function load_module($directory, $urltoroot)
	{
		$this->urltoroot = $urltoroot;
	}
 
	function allow_template($template) {
		return true;
	}

	function allow_region($region) {
		return in_array($region, array('side', 'leftside'));
	}

	function output_widget($region, $place, $themeobject, $template, $request, $qa_content) {

	
		$widget_title =	qa_opt('fbinvite_plugin_widget_title');
		$widget_content =	qa_opt('fbinvite_plugin_widget_content');
		$widget_button =	qa_opt('fbinvite_plugin_widget_button');
		$widget_fbid =	qa_opt('fbinvite_app_id');
		$popup_title = qa_opt('fbinvite_plugin_popup_title');
				
		echo '<div class="fbinvite-widget-gyzgyn">';
		echo '<h2 class="fbinvite-widget-title">'.$widget_title.'</h2>';
		echo '<div class="fb-invite-widget-content">
				<img src="'.qa_path_to_root().'/qa-plugin/q2a-fbinvite-gyzgyn/fb.png" alt="Facebook" title="Facebook width="50" height="50"/>			  
				<span>'.$widget_content.'</span>
              </div>
				<script src="https://connect.facebook.net/en_US/all.js"></script>   
					<input id="qa_fb_invite" type="button" onclick="sendRequestViaMultiFriendSelector(); return false;" value="'.$widget_button.'"/>
				<script>
					FB.init({
						appId  : "'.$widget_fbid.'",
						frictionlessRequests: true,
					});

					function sendRequestToRecipients() {
						var user_ids = document.getElementsByName("user_ids")[0].value;
						FB.ui({method: "apprequests",
							message: "'.$popup_title.'",
							to: user_ids, 
						}, requestCallback);
					}

					function sendRequestViaMultiFriendSelector() {
						FB.ui({method: "apprequests",
							message: "'.$popup_title.'"
						}, requestCallback);
					}
      
					function requestCallback(response) {
						// Handle callback here
					}
				</script>';
	} 
};

/*
	Omit PHP closing tag to help avoid accidental output
*/
