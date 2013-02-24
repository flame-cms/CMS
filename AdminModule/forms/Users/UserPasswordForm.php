<?php
/**
 * UserPasswordForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Users;

class UserPasswordForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	public function configure()
	{
		$this->addPassword('oldPassword', 'Current password:', 30)
			->addRule(self::FILLED);
		$this->addPassword('newPassword', 'New password:', 30)
			->addRule(self::MIN_LENGTH, null, 6);
		$this->addPassword('confirmPassword', 'New password (verify):', 30)
			->addRule(self::FILLED)
			->addRule(self::EQUAL, 'Entered passwords is not equal. Try it again.', $this['newPassword']);
		$this->addSubmit('send', 'Change password');
	}

}
