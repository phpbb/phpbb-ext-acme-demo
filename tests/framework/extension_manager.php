<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\tests\framework;

class extension_manager extends \phpbb\extension\manager
{
	protected $ext_name = 'acme/demo';

	public function __construct()
	{
		global $phpbb_root_path;
		$this->extensions = array($this->ext_name => array(
			'ext_active' => 1,
			'ext_path' => "{$phpbb_root_path}ext/{$this->ext_name}/",
		));
	}
}
