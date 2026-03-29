<?php
/**
 *
 * Acme Demo Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013, Joas Schilling, https://github.com/nickvergessen/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace acme\demo\tests\controller;

class main_test extends \phpbb_test_case
{
	/**
	 * Dataset for the test_handle() test
	 */
	public function handle_data()
	{
		return [
			[200, '@acme_demo/demo_body.html'],
		];
	}

	/**
	 * A simple test that creates the controller class, and
	 * checks that its handle() method is working as expected.
	 *
	 * Note the dataProvider is required in this docblock to
	 * define the data set method this test will be using (above).
	 *
	 * @dataProvider handle_data
	 */
	public function test_handle($status_code, $page_content)
	{
		// Mocks are dummy implementations that provide the API of components we depend on //
		/** @var \phpbb\template\template $template Mock the template class */
		$template = $this->getMockBuilder('\phpbb\template\template')
			->disableOriginalConstructor()
			->getMock();

		/** @var \phpbb\language\language|\PHPUnit\Framework\MockObject\MockObject $language Mock the language class */
		$language = $this->getMockBuilder('\phpbb\language\language')
			->disableOriginalConstructor()
			->getMock();

		// Set language->lang() to return any arguments sent to it
		$language->method('lang')
			->will($this->returnArgument(0));

		/** @var \phpbb\controller\helper|\PHPUnit\Framework\MockObject\MockObject $controller_helper Mock the controller helper class */
		$controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();

		// Set the expected output of the controller_helper->render() method
		$controller_helper->expects($this->once())
			->method('render')
			->willReturnCallback(function ($template_file, $page_title = '', $status_code = 200, $display_online_list = false) {
				return new \Symfony\Component\HttpFoundation\Response($template_file, $status_code);
			});

		// Instantiate the controller
		$controller = new \acme\demo\controller\main_controller(
			new \phpbb\config\config([]),
			$controller_helper,
			$template,
			$language
		);

		$response = $controller->handle('test');
		$this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
		$this->assertEquals($status_code, $response->getStatusCode());
		$this->assertEquals($page_content, $response->getContent());
	}
}
