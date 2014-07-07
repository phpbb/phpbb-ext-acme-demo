<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\migrations;

class release_1_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'users', 'user_acme');
	}

	static public function depends_on()
	{
		return array('\acme\demo\migrations\release_1_0_0');
	}

	public function update_schema()
	{
		return array(
			'add_tables'		=> array(
				$this->table_prefix . 'acme_demo'	=> array(
					'COLUMNS'		=> array(
						'acme_id'			=> array('UINT', null, 'auto_increment'),
						'acme_name'			=> array('VCHAR:255', ''),
					),
					'PRIMARY_KEY'	=> 'acme_id',
				),
			),
			'add_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_acme'				=> array('UINT', 0),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_acme',
				),
			),
			'drop_tables'		=> array(
				$this->table_prefix . 'acme_demo',
			),
		);
	}
}
