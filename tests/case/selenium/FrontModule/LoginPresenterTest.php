<?php
/**
 * SingPresenterTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    05.08.12
 */

namespace Flame\CMS\Tests\Selenium;

class LoginPresenterTest extends \Flame\CMS\Tests\SeleniumTestCase
{
	/**
	 * @test
	 */
	public function testEmptyForm()
	{
		$this->url('/login');
		$this->clickOnElement('frm-loginForm-login');
		$this->assertEquals('Field "Email:" is required.', $this->alertText());
	}

	/**
	 * @test
	 */
	public function testNoPassword()
	{
		$this->url('/login');
		$element = $this->byId('frm-loginForm-email');
		$element->value('user@demo.com');
		$this->clickOnElement('frm-loginForm-login');
		$this->assertEquals('Field "Password:" is required.', $this->alertText());
	}

	/**
	 * @test
	 */
	public function testNoEmail()
	{
		$this->url('/login');
		$element = $this->byId('frm-loginForm-password');
		$element->value('password12');
		$this->clickOnElement('frm-loginForm-login');
		$this->assertEquals('Field "Email:" is required.', $this->alertText());
	}

	/**
	 * @test
	 */
	public function testError()
	{
		$this->url('/login');

		$element = $this->byId('frm-loginForm-password');
		$element->value('password12');

		$element = $this->byId('frm-loginForm-email');
		$element->value('user@demo.bad');

		$this->clickOnElement('frm-loginForm-login');

		$error = $this->byCssSelector('h4');

		$this->assertEquals('Email \'user@demo.bad\' not found.', $error->text());
	}

	/**
	 * @test
	 */
	public function testLogin()
	{
		$this->url('/login');

		$element = $this->byId('frm-loginForm-email');
		$element->value('user@demo.com');

		$element = $this->byId('frm-loginForm-password');
		$element->value('password12');

		$this->clickOnElement('frm-loginForm-login');

		$this->assertEquals($this->trimUrl($this->url()), 'admin');
	}

}
