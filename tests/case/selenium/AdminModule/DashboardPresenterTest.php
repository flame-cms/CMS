<?php
/**
 * DashboardPresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package  Flame\CMS
 *
 * @date    05.08.12
 */

namespace Flame\CMS\Tests\Selenium\AdminModule;

class DashboardPresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	/**
	 * @test
	 */
	public function testWelcomeText()
	{
		$this->loginUser();
		$this->url('/admin');
		$element = $this->byCssSelector('h2');
		$this->assertEquals('Welcome to the administration', $element->text());
	}

}
