<?php
/**
 *
 * Acme Demo Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026, Joas Schilling, https://github.com/nickvergessen/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace acme\demo\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['acme_demo_goodbye']);
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	public function update_data()
	{
		return [
			['config.add', ['acme_demo_goodbye', 0]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_DEMO_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_DEMO_TITLE',
				[
					'module_basename'	=> '\acme\demo\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
