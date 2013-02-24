<?php
/**
 * CategoryForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace Flame\CMS\AdminModule\Forms\Categories;

class CategoryForm extends \Flame\CMS\AppModule\Application\UI\Form
{
	/**
	 * @var array
	 */
	private $categories;

	/**
	 * @param array $categories
	 * @param array $defaults
	 */
	public function __construct(array $categories, array $defaults = array())
	{
		parent::__construct();

		$this->categories = $this->prepareForFormItem($categories);
		$this->configure();

		if(count($defaults)){
			$this->setDefaults($defaults);
			$this->addSubmit('send', 'Edit');
		}else{
			$this->addSubmit('send', 'Add');
		}
	}

	private function configure()
	{
		$this->addText('name', 'Name:', 50)
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addText('slug', 'Slug:', 50)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addSelect('parent', 'In category:', $this->categories)
			->setPrompt('-- No parent category --');

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 250);
	}

}
