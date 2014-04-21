<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\tests\framework;

abstract class database_test_case extends \phpbb_database_test_case
{
	static protected $schema_file;
	static protected $phpbb_schema_copy;
	static protected $install_schema_file;

	static public function setUpBeforeClass()
	{
		self::$schema_file = __DIR__ . '/schemas/schema.json';
		self::$phpbb_schema_copy = __DIR__ . '/schemas/schema_phpbb_copy.json';
		self::$install_schema_file = __DIR__ . '/../../../../../install/schemas/schema.json';

		if (!file_exists(self::$schema_file))
		{
			global $phpbb_root_path, $phpEx, $table_prefix;

			$finder = new \phpbb\extension\finder(new \acme\demo\tests\framework\extension_manager(), new \phpbb\filesystem(), $phpbb_root_path);
			$classes = $finder->core_path('phpbb/')
				->core_directory('db/migration/data')
				->extension_directory('migrations')
				->get_classes();

			$db = new \phpbb\db\driver\sqlite();
			$schema_generator = new \phpbb\db\migration\schema_generator($classes, new \phpbb\config\config(array()), $db, new \phpbb\db\tools($db, true), $phpbb_root_path, $phpEx, $table_prefix);
			$schema_data = $schema_generator->get_schema();

			$fp = fopen(self::$schema_file, 'wb');
			fwrite($fp, json_encode($schema_data));// @todo php 5.4+ required: , JSON_PRETTY_PRINT));
			fclose($fp);
		}

		copy(self::$install_schema_file, self::$phpbb_schema_copy);
		copy(self::$schema_file, self::$install_schema_file);

		parent::setUpBeforeClass();
	}

	static public function tearDownAfterClass()
	{
		copy(self::$phpbb_schema_copy, self::$install_schema_file);

		parent::tearDownAfterClass();
	}
}
