<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\mcp;

class main_module
{
	var $p_master;
	var $u_action;

	function main($id, $mode)
	{
		switch ($mode)
		{
			default:
				$this->tpl_name = 'mcp_demo_body';
				$this->page_title = 'MCP_DEMO';
			break;
		}
	}
}
