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

	class qa_fbinvite_admin {
		
		function allow_template($template)
		{
			return ($template!='admin');
		}

		function option_default($option) {

			switch($option) {
				case 'fbinvite_plugin_widget_hidecss':
					return '0';
				case 'fbinvite_plugin_widget_title':
					return 'Facebook Friends Invitation';
				case 'fbinvite_plugin_widget_content':
					return 'Invite your Facebook friends to Q2A';
				case 'fbinvite_plugin_widget_button':
					return 'Invite';
				case 'fbinvite_app_id':
					return '322987107777035';
				default:
					return null;
			}
			
		}

		function admin_form(&$qa_content)
		{

		//	Process form input

			$ok = null;
			if (qa_clicked('fbinvite_save_button')) {
				qa_opt('fbinvite_plugin_widget_hidecss',qa_post_text('fbinvite_plugin_widget_hidecss'));
				qa_opt('fbinvite_plugin_widget_title',qa_post_text('fbinvite_plugin_widget_title'));
				qa_opt('fbinvite_plugin_widget_content',qa_post_text('fbinvite_plugin_widget_content'));
				qa_opt('fbinvite_plugin_widget_button',qa_post_text('fbinvite_plugin_widget_button'));
				qa_opt('fbinvite_app_id',qa_post_text('fbinvite_app_id'));
				
				$ok = qa_lang('admin/options_saved');
			}
			else if (qa_clicked('fbinvite_reset_button')) {
				foreach($_POST as $i => $v) {
					$def = $this->option_default($i);
					if($def !== null) qa_opt($i,$def);
				}
				$ok = qa_lang('admin/options_reset');
			}			
		//	Create the form for display
			
		
			$fields = array();

			$fields[] =array(
				'type' => 'checkbox',
				'label' => 'Don\'t add CSS inline',
				'tags' => 'NAME="fbinvite_plugin_widget_hidecss"',
				'value' => qa_opt('fbinvite_plugin_widget_hidecss'),
				'note' => 'If you tick this inline css will be removed. So, you should be adding this css codes into your themes styles.css file.',
			);
									
			$fields[] = array(
				'label' => 'Widget Block Title',
				'tags' => 'NAME="fbinvite_plugin_widget_title"',
				'value' => qa_opt('fbinvite_plugin_widget_title'),
			);

			$fields[] = array(
				'label' => 'Widget Block Content',
				'type' => 'text',
				'tags' => 'NAME="fbinvite_plugin_widget_content"',
				'value' => qa_opt('fbinvite_plugin_widget_content'),
			);
			
			$fields[] = array(
				'label' => 'Widget FB app id',
				'tags' => 'NAME="fbinvite_app_id"',
				'value' => qa_opt('fbinvite_app_id'),
				'note' => 'if you have not got an app yet, first go to <a href="https://developers.facebook.com" target="_blank">facebook developers page</a> and create a new app. Do not forget to set the apps category as "Games".',
			);
			
			$fields[] = array(
				'label' => 'Widget Block Invite Button',
				'type' => 'text',
				'tags' => 'NAME="fbinvite_plugin_widget_button"',
				'value' => qa_opt('fbinvite_plugin_widget_button'),
			);					

			$fields[] = array(
				'type' => 'blank',
			);			
						
			return array(
				'ok' => ($ok && !isset($error)) ? $ok : null,
				
				'fields' => $fields,
				
				'buttons' => array(
					array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'NAME="fbinvite_save_button"',
					),
					array(
					'label' => qa_lang_html('admin/reset_options_button'),
					'tags' => 'NAME="fbinvite_reset_button"',
					),
				),
			);
		}
	}
