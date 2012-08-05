<?php

namespace Flame\CMS\Tests;

use Nette\Environment;

class SeleniumTestCase extends \PHPUnit_Extensions_Selenium2TestCase
{

	public function setUp()
	{
		$seleniumConfiguration = $this->getSeleniumConfig();
		$this->setHost($seleniumConfiguration['host']);
		$this->setBrowser($seleniumConfiguration['browser']);
		$this->setBrowserUrl($seleniumConfiguration['browserUrl']);
		if ($seleniumConfiguration['port']) {
			$this->setPort((int) $seleniumConfiguration['port']);
		}
	}

	protected function getContainer()
	{
		return Environment::getService('container');
	}

	protected function getSeleniumConfig()
	{
		return $this->getContainer()->expand('%selenium%');
	}

	protected function trimUrl($url)
	{
		$params = $this->getSeleniumConfig();

		if(isset($params['browserUrl'])){
			return trim(str_replace($params['browserUrl'], '', $url), '/');
		}

		return $url;
	}

	protected function loginUser()
	{
		$this->url('/admin/sign/in');

		$element = $this->byId('frm-signInForm-email');
		$element->value('user@demo.com');

		$element = $this->byId('frm-signInForm-password');
		$element->value('password12');

		$this->clickOnElement('frm-signInForm-login');
	}

}