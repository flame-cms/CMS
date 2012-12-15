<?php
/**
 * OptionForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    05.08.12
 */

namespace Flame\CMS\AdminModule\Forms\Options;

class OptionForm extends \Flame\CMS\Application\UI\Form
{

	/**
	 * @var array
	 */
	private $availableSettings;

	/**
	 * @param array $settings
	 */
	public function setAvailableSetting(array $settings)
	{
		$this->availableSettings = $settings;
	}
	
	public function configureAdd()
	{
		$this->addSelect('name', 'Name', $this->availableSettings)
			->setPrompt('-- Select one --')
			->addRule(self::FILLED);

		$this->addTextArea('value', 'Value:')
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 250);
		
		$this->addSubmit('Submit', 'Add');
	}

	public function configureEdit(array $default)
	{
		$this->addText('name', 'Name:', 54)
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 50)
			->setDisabled();

		$this->addTextArea('value', 'Value:')
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 250);

		$this->setDefaults($default);
		
		$this->addSubmit('Submit', 'Edit');
	}

}
