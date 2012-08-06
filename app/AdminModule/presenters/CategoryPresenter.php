<?php
/**
 * CategoryPresenter.php
 *
 * @author  Jiří Šifalda <jsifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace AdminModule;

use Flame\CMS\Forms\CategoryForm;

class CategoryPresenter extends AdminPresenter
{

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var \Flame\CMS\Models\Categories\Category
	 */
	private $category;

	/**
	 * @var \Flame\CMS\Models\Categories\CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @var array
	 */
	private $categories;

	/**
	 * @param \Flame\CMS\Models\Categories\CategoryFacade $categoryFacade
	 */
	public function injectCategoryFacade(\Flame\CMS\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
	}

	public function renderDefault()
	{
		$this->template->categories = $this->categoryFacade->getLastCategories();
	}

	/**
	 * @param $id
	 */
	public function actionEdit($id)
	{
		$this->id = $id;

		if(!$this->category = $this->categoryFacade->getOne($id)){
			$this->flashMessage('Category does not exist!');
			$this->redirect('Category:');
		}
	}

	/**
	 * @return \Flame\CMS\Forms\CategoryForm
	 */
	protected function createComponentCategoryForm()
	{

		$f = new CategoryForm($this, 'categoryForm');

		if($categories = $this->categoryFacade->getLastCategories()){
			$f->addCategories($categories);
		}

		if($this->id){
			$f->configureEdit($this->category->toArray());
		}else{
			$f->configureAdd();
		}

		$f->onSuccess[] = $this->categoryFormSubmitted;

		return $f;
	}

	/**
	 * @param \Flame\CMS\Forms\CategoryForm $form
	 * @throws \Nette\Application\BadRequestException
	 */
	public function categoryFormSubmitted(CategoryForm $form)
	{
		if($this->id and !$this->category){
			throw new \Nette\Application\BadRequestException;
		}

		$values = $form->getValues();

		if(empty($values['slug'])){
			$slug = $this->createSlug($values['name']);
		}else{
			$slug = $this->createSlug($values['slug']);
		}

		if($this->id){
			$this->category
				->setName($values['name'])
				->setSlug($slug)
				->setDescription($values['description']);

			if($parent = $this->categoryFacade->getOne($values['parent'])){
				$this->category->setParent($parent);
			}

			$this->categoryFacade->persist($this->category);
			$this->flashMessage('Category was edited');

		}else{

			if($this->categoryFacade->getOneByName($values['name'])){
				$this->flashMessage('Category with name "' . $values['name'] . '" exist.');
			}else{
				$category = new \Flame\CMS\Models\Categories\Category($values['name'], $slug);
				$category->setDescription($values['description']);

				if($parent = $this->categoryFacade->getOne($values['parent'])){
					$category->setParent($parent);
				}

				$this->categoryFacade->persist($category);
				$this->flashMessage('Category was added');
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}

	/**
	 * @param $id
	 */
	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Category', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$category = $this->categoryFacade->getOne($id);

			if($category){
				$this->categoryFacade->delete($category);
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}
}
