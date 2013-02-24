<?php
/**
 * ImageCategoryForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    22.11.12
 */

namespace Flame\CMS\AdminModule\Forms\ImageCategories;

class ImageCategoryForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	/**
	 * @param array $defaults
	 */
	public function __construct(array $defaults = array())
	{
		parent::__construct();

		$this->configure();

		if(count($defaults)){
			$this->addSubmit('send', 'Edit');
			$this->setDefaults($defaults);
		}else{
			$this->getElementPrototype()->class[] = 'ajax';
			$this->addSubmit('send', 'Add');
		}
	}


	private function configure()
	{

		$this->addText('name', 'Name')
			->setRequired();

		$this->addText('slug', 'Slug')
			->setRequired();

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 1000);

	}

}
