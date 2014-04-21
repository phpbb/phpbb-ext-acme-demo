<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\tests\mock;

/**
* User Mock
* @package phpBB3
*/
class user extends \phpbb\user
{
	public function __construct()
	{
	}

	public function lang()
	{
		return implode(' ', func_get_args());
	}
}
