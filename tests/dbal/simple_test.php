<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\tests\dbal;

class simple_test extends \phpbb_database_test_case
{
	static protected function setup_extensions()
	{
		return array('acme/demo');
	}

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/config.xml');
	}

	public function test_column()
	{
		$this->db = $this->new_dbal();
		$factory = new \phpbb\db\tools\factory();
		$db_tools = $factory->get($this->db);
		$this->assertTrue($db_tools->sql_column_exists(USERS_TABLE, 'user_acme'), 'Asserting that column "user_acme" exists');
		$this->assertFalse($db_tools->sql_column_exists(USERS_TABLE, 'user_acme_demo'), 'Asserting that column "user_acme_demo" does not exist');
	}
}
