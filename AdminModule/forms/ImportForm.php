<?php
/**
 * ImportForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    18.07.12
 */

namespace Flame\CMS\AdminModule;

class ImportForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	public function configure()
	{
		$this->addUpload('file', 'XML file:')
			->addRule(self::FILLED);
		$this->addCheckbox('downloadImages', 'Do you want to import images too?')
			->setDefaultValue(1);
		$this->addSubmit('send', 'Import data');
	}

}
