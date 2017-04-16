<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\migrations;

class modules extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\acme\demo\migrations\release_1_0_1');
	}

	public function update_data()
	{
		return array(
			array('module.add', array(
				'ucp',
				'UCP_MAIN',
				array(
					'module_basename'    => '\acme\demo\ucp\main_module',
					'modes'                => array('settings'),
				),
			)),

			array('module.add', array(
				'mcp',
				false,
				'MCP_DEMO_TITLE'
			)),
			array('module.add', array(
				'mcp',
				'MCP_DEMO_TITLE',
				array(
					'module_basename'	=> '\acme\demo\mcp\main_module',
					'modes'				=> array('main'),
				),
			)),
		);
	}
}
