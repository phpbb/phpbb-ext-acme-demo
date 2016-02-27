<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\tests\controller;

class main_test extends \phpbb_test_case
{
	public function handle_data()
	{
		return array(
			array(200, 'demo_body.html'),
		);
	}

	/**
	 * @dataProvider handle_data
	 */
	public function test_handle($status_code, $page_content)
	{
		// Mocks are dummy implementations that provide the API of components we depend on //
		/** @var \phpbb\template\template $template Mock the template class */
		$template = $this->getMockBuilder('\phpbb\template\template')
			->disableOriginalConstructor()
			->getMock();

		/** @var \phpbb\user $user Mock the user class */
		$user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));

		/** @var \phpbb\controller\helper $controller_helper Mock the controller helper class */
		$controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();

		// Set the expected output of the controller_helper->render() method
		$controller_helper->expects($this->any())
			->method('render')
			->willReturnCallback(function ($template_file, $page_title = '', $status_code = 200, $display_online_list = false) {
				return new \Symfony\Component\HttpFoundation\Response($template_file, $status_code);
			});

		// Instantiate the acme demo controller
		$controller = new \acme\demo\controller\main(
			new \phpbb\config\config(array()),
			$controller_helper,
			$template,
			$user
		);

		$response = $controller->handle('test');
		$this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
		$this->assertEquals($status_code, $response->getStatusCode());
		$this->assertEquals($page_content, $response->getContent());
	}
}
