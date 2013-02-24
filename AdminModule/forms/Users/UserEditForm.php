<?php
/**
 * UserEditForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Users;

class UserEditForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	public function configure(array $defaults)
	{
		$this->addText('name', 'Name:', 60)
			->addRule(self::MAX_LENGTH, null, 150);

		$this->addTextArea('about', 'About:', 60, 5)
			->addRule(self::MAX_LENGTH, null, 250);

		$this->addDatePicker('birthday', 'Birthday:')
			->setDefaultValue(new \DateTime())
			->addRule(self::VALID, 'Entered date is not valid');

		$this->addText('web', 'Web:', 60)
			->addRule(self::MAX_LENGTH, null, 150);

		$this->addText('facebook', 'Facebook:', 60)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addText('twitter', 'Twitter:', 60)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addText('email', 'EMAIL:', 60)
			->addRule(self::MAX_LENGTH, null, 100)
			->addRule(self::EMAIL)
			->controlPrototype->readonly = 'readonly';

		$this->setDefaults($defaults);

		$this->addSubmit('send', 'Edit');
	}

}
