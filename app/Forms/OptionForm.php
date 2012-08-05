<?php
/**
 * OptionForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    05.08.12
 */

namespace Flame\CMS\Forms;

class OptionForm extends \Flame\Application\UI\Form
{
	
	public function configureAdd()
	{

		$this->addText('name', 'Name:', 54)
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 50);

		$this->configure();
		
		$this->addSubmit('Submit', 'Add');
	}

	public function configureEdit()
	{
		$this->addText('name', 'Name:', 54)
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 50)
			->setDisabled();
		
		$this->configure();
		
		$this->addSubmit('Submit', 'Edit');
	}
	
	private function configure()
	{
		$this->getElementPrototype()->class[] = 'ajax';

		$this->addTextArea('value', 'Value:')
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 250);
	}

}
