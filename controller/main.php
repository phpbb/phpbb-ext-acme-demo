<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\controller;

/**
* @ignore
*/

class main
{
	/* @var \phpbb\controller\helper */
	protected $helper;

	/**
	* Constructor
	*
	* @param \phpbb\template			$template
	* @param \phpbb\controller\helper	$helper
	*/
	public function __construct(\phpbb\template\template $template, \phpbb\controller\helper $helper)
	{
		$this->template = $template;
		$this->helper = $helper;
	}

	/**
	* Demo controller for route /demo/{name}
	*
	* @param string		$name
	* @return Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function handle($name)
	{
		$this->template->assign_var('DEMO_NAME', $name);

		return $this->helper->render('demo_body.html', $name);
	}
}
