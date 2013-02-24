<?php
/**
 * UserAddForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Users;

class UserAddForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	public function configure()
	{

		$this->addSelect('role', 'Role:')
			->setItems(array('user', 'moderator', 'administrator'), false)
			->setRequired();

		$this->addText('email', 'EMAIL:', 60)
			->addRule(self::MAX_LENGTH, null, 100)
			->addRule(self::EMAIL)
			->setRequired();

		$this->addPassword('password', 'Password:', 60)
			->setRequired();

		$this->addPassword('passwordTwo', 'Password (check):', 60)
			->addRule(self::EQUAL, 'Entered passwords is not equal. Try it again.', $this['password']);

		$this->addSubmit('send', 'Add');
	}

}
