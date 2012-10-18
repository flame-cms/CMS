<?php
/**
 * TagForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace AdminModule;

class TagForm extends \Flame\CMS\Application\UI\Form
{

	public function configureAdd()
	{
		$this->configure();
		$this->addSubmit('send', 'create');
	}

	public function configureEdit(array $defaults)
	{
		$this->configure();
		$this->setDefaults($defaults);
		$this->addSubmit('send', 'edit');
	}

	private function configure()
	{
		$this->getElementPrototype()->class[] = 'ajax';

		$this->addText('name', 'Name:')
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addText('slug', 'Slug:')
			->addRule(self::MAX_LENGTH, null, 100);
	}

}
