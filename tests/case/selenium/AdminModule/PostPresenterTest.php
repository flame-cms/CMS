<?php
/**
 * PostPresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    06.08.12
 */

namespace Flame\CMS\Tests\Selenium\Flame\CMS\AdminModule;

class PostPresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	
	/**
	 * @test
	 */
	public function testAddEmptyContent()
	{
		$this->loginUser();
		$this->url('/admin/post/add');

		$name = $this->byName('name');
		$name->value('name');

//		$this->frame('frm-postForm-content_ifr');
//		$content = $this->byId('tinymce');
//		$content->value('content');

		$category = $this->byName('categoryNew');
		$category->value('category');

		$this->clickOnElement('frm-postForm-send');

		//$error = $this->byCssSelector('h4');
		//$this->assertEquals('Post was successfully added.', $error->text());
		$this->assertEquals('Field "Content:" is required.', $this->alertText());
	}

}
