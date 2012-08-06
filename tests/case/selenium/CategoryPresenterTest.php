<?php
/**
 * CategoryPresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    06.08.12
 */

namespace Flame\CMS\Tests\Selenium;

class CategoryPresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	
	/**
	 * @test
	 */
	public function testAddCategory()
	{
		$this->loginUser();
		$this->url('admin/category');

		$name = $this->byName('name');
		$name->value('test category ' . $this->getUniqueId());

		$this->clickOnElement('frm-categoryForm-send');

		sleep(1);

		$status = $this->byCssSelector('h4');
		$this->assertEquals('Category was added', $status->text());
	}

}
