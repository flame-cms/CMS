<?php
/**
 * CategoryForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace Flame\CMS\Forms;

class CategoryForm extends \Flame\Application\UI\Form
{
	/**
	 * @var array
	 */
	private $categories;

	/**
	 * @param array $categories
	 */
	public function setCategories(array $categories)
	{
		$this->categories = $this->prepareForFormItem($categories);
	}

	public function restore($defaults = array(), $categories = array())
	{
		parent::restore($defaults);
		$this['parent']->setItems($categories);
	}


	public function configureAdd()
	{
		$this->configure();
		$this->addSubmit('send', 'create');
	}

	/**
	 * @param array $defaults
	 */
	public function configureEdit(array $defaults)
	{
		$this->configure();
		$this->setDefaults($defaults);
		$this->addSubmit('send', 'edit');
	}

	private function configure()
	{
		$this->getElementPrototype()->class[] = 'ajax';

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
