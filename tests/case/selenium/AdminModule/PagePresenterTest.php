<?php
/**
 * PagePresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    08.08.12
 */

namespace Flame\CMS\Tests\Selenium\Flame\CMS\AdminModule;

class PagePresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	/**
	 * @test
	 */
	public function test()
	{
		$this->loginUser();
		$this->url('/admin/page/add');

		$name = $this->byName('name');
		$name->value($this->getUniqueId());

		$this->clickOnElement('frm-pageForm-send');

		$this->assertEquals('Field "Content:" is required.', $this->alertText());

	}
}
