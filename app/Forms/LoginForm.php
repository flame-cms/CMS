<?php
/**
 * SignInForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    22.07.12
 */

namespace Flame\CMS\Forms;

class LoginForm extends \Flame\Application\UI\Form
{
	
	public function configure()
	{
		$this->addText('email', 'Email:', 30)
			->addRule(self::FILLED);
		$this->addPassword('password', 'Password:', 30)
			->addRule(self::FILLED);
		$this->addCheckbox('persistent', 'Remember me?');
		$this->addSubmit('login', 'Login');
	}

}
