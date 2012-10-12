<?php
/**
 * InForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package DoctrineSandbox
 *
 * @date    01.09.12
 */

namespace DoctrineSandbox\Forms\Sign;

class InForm extends \Flame\Application\UI\Form
{

	public function configure()
	{
		$this->addText('email', 'Email:')
			->setRequired('Please provide a email.');

		$this->addPassword('password', 'Password:')
			->setRequired('Please provide a password.');

		$this->addCheckbox('remember', 'Remember me on this computer');

		$this->addSubmit('send', 'Sign in');
	}

}
