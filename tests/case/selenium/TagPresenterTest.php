<?php
/**
 * TagPresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    06.08.12
 */

namespace Flame\CMS\Tests\Selenium;

class TagPresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	
	/**
	 * @test
	 */
	public function testAddTag()
	{
		$this->loginUser();
		$this->url('/admin/tag/');
		$name = $this->byName('name');
		$name->value('name' . $this->getUniqueId());

		$this->clickOnElement('frm-tagForm-send');

		sleep(1);

		$status = $this->byCssSelector('h4');
		$this->assertEquals('Tag was added', $status->text());
	}

}
