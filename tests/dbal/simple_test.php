<?php
/**
 *
 * Acme Demo Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013, Joas Schilling, https://github.com/nickvergessen/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace acme\demo\tests\dbal;

class simple_test extends \phpbb_database_test_case
{
	/**
	 * @inheritdoc
	 */
	protected static function setup_extensions()
	{
		return ['acme/demo'];
	}

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	 * @inheritdoc
	 */
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/config.xml');
	}

	/**
	 * A simple test checking to see if the database users table was correctly updated
	 */
	public function test_column()
	{
		$this->db = $this->new_dbal();

		if (phpbb_version_compare(PHPBB_VERSION, '3.2.0-dev', '<'))
		{
			// This is how to instantiate db_tools in phpBB 3.1
			$db_tools = new \phpbb\db\tools($this->db);
		}
		else
		{
			// This is how to instantiate db_tools in phpBB 3.2
			$factory = new \phpbb\db\tools\factory();
			$db_tools = $factory->get($this->db);
		}

		$this->assertTrue($db_tools->sql_column_exists(USERS_TABLE, 'user_demo'), 'Asserting that column "user_demo" exists');
		$this->assertFalse($db_tools->sql_column_exists(USERS_TABLE, 'user_demo_void'), 'Asserting that column "user_demo_void" does not exist');
	}
}
