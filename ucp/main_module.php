<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\ucp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $request, $template, $user;

		$submit = $request->is_set_post('submit');

		$this->tpl_name = 'ucp_demo_body';
		$this->page_title = $user->lang('UCP_DEMO_TITLE');
		add_form_key('acme/demo');

		$data = array(
			'user_acme' => $request->variable('acme_demo_goodbye', (!empty($user->data['user_acme'])) ? $user->data['user_acme'] : 0),
		);

		if ($submit)
		{
			if (check_form_key('acme/demo'))
			{
				$sql_ary = array(
					'user_acme'	=> $data['user_acme'],
				);

				$sql = 'UPDATE ' . USERS_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
					WHERE user_id = ' . $user->data['user_id'];
				$db->sql_query($sql);

				$msg = $user->lang['PREFERENCES_UPDATED'];
			}
			else
			{
				$msg = $user->lang['FORM_INVALID'];
			}
			meta_refresh(3, $this->u_action);
			$message = $msg . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
			trigger_error($message);
		}

		$template->assign_vars(array(
			'U_ACTION'				=> $this->u_action,
			'ACME_DEMO_GOODBYE'		=> $data['user_acme'],
		));
	}
}
