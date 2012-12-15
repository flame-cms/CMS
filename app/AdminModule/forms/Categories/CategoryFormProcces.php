<?php
/**
 * CategoryFormProcces.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    24.11.12
 */

namespace Flame\CMS\AdminModule\Forms\Categories;

use Flame\Utils\Strings;

class CategoryFormProcces extends \Nette\Object
{

	/**
	 * @var \Flame\CMS\Models\Categories\CategoryFacade $categoryFacade
	 */
	private $categoryFacade;

	/**
	 * @param \Flame\CMS\Models\Categories\CategoryFacade $categoryFacade
	 */
	public function injectCategoryFacade(\Flame\CMS\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
	}

	/**
	 * @param CategoryForm $form
	 * @param \Flame\CMS\Models\Categories\Category $category
	 */
	public function edit(CategoryForm $form, \Flame\CMS\Models\Categories\Category $category)
	{
		$values = $form->getValues();
		$slug = $this->createSlug($values);

		$category->setName($values['name'])
			->setSlug($slug)
			->setDescription($values['description']);

		if($parent = $this->categoryFacade->getOne($values['parent'])){
			$category->setParent($parent);
		}

		$this->categoryFacade->save($category);
		$form->presenter->flashMessage('Category was edited', 'success');
	}

	/**
	 * @param CategoryForm $form
	 */
	public function add(CategoryForm $form)
	{
		$values = $form->getValues();
		$slug = $this->createSlug($values);

		if($this->categoryFacade->getOneByName($values['name'])){
			$this->flashMessage('Category with name "' . $values['name'] . '" exist.');
		}else{
			$category = new \Flame\CMS\Models\Categories\Category($values['name'], $slug);
			$category->setDescription($values['description']);

			if($parent = $this->categoryFacade->getOne($values['parent'])){
				$category->setParent($parent);
			}

			$this->categoryFacade->save($category);
			$form->presenter->flashMessage('Category was added', 'success');
		}
	}

	/**
	 * @param $values
	 * @return mixed
	 */
	protected function createSlug($values)
	{
		if(empty($values['slug'])){
			return Strings::webalize($values['name']);
		}else{
			return Strings::webalize($values['slug']);
		}
	}
}
