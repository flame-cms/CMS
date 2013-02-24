<?php
/**
 * AddLinkForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Menu;

class RawLinkForm extends \Flame\CMS\AppModule\Application\UI\Form
{
	public function configureAdd()
	{
		$this->configure();
		$this->setDefaults(array('priority' => 5));
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
		$this->addText('title', 'Title')
			->setRequired();
		$this->addText('url',  'URL')
			->setRequired();
		$this->addText('priority', 'Priority')
			->setType('number');

	}

}
