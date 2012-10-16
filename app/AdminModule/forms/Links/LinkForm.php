<?php
/**
 * LinkForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package AdminModule
 *
 * @date    15.10.12
 */

namespace AdminModule\Forms\Links;

class LinkForm extends \Flame\Application\UI\Form
{

	public function configureAdd()
	{
		$this->configure();
		$this->setDefaults(array('public' => true));
		$this->addSubmit('send', 'Add');
	}

	public function configureEdit(array $defaults)
	{
		$this->configure();
		$this->setDefaults($defaults);
		$this->addSubmit('send', 'Edit');
	}

	private function configure()
	{
		$this->addText('name', 'Title')
			->addRule(self::MAX_LENGTH, null, 255)
			->setRequired();

		$this->addText('url', 'URL')
			->addRule(self::MAX_LENGTH, null, 255)
			->setRequired();

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 500);

		$this->addCheckbox('public', 'Show?');
	}

}
