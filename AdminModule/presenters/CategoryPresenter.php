<?php
/**
 * CategoryPresenter.php
 *
 * @author  Jiří Šifalda <jsifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace Flame\CMS\AdminModule;

class CategoryPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Categories\Category
	 */
	private $category;

	/**
	 * @var \Flame\CMS\Models\Categories\CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Categories\ICategoryFormFactory $categoryFormFactory
	 */
	private $categoryFormFactory;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Categories\CategoryFormProcces $categoryFormProcces
	 */
	private $categoryFormProcces;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Categories\CategoryFormProcces $categoryFormProcces
	 */
	public function injectCategoryFormProcces(\Flame\CMS\AdminModule\Forms\Categories\CategoryFormProcces $categoryFormProcces)
	{
		$this->categoryFormProcces = $categoryFormProcces;
	}

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Categories\ICategoryFormFactory $categoryFormFactory
	 */
	public function injectCategoryFormFactory(\Flame\CMS\AdminModule\Forms\Categories\ICategoryFormFactory $categoryFormFactory)
	{
		$this->categoryFormFactory = $categoryFormFactory;
	}

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
		if(!$this->category = $this->categoryFacade->getOne($id)){
			$this->flashMessage('Category does not exist!');
			$this->redirect('Category:');
		}

		$this->template->category = $this->category;
	}

	/**
	 * @return Forms\Categories\CategoryForm
	 */
	protected function createComponentCategoryForm()
	{

		$form = $this->categoryFormFactory->create(
			$this->categoryFacade->getLastCategories(),
			$this->category ? $this->category->toArray() : array()
		);

		$form->onSuccess[] = $this->formSubmitted;
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
	}

	/**
	 * @param Forms\Categories\CategoryForm $form
	 */
	public function formSubmitted(\Flame\CMS\AdminModule\Forms\Categories\CategoryForm $form)
	{
		if($this->category){
			$this->categoryFormProcces->edit($form, $this->category);
		}else{
			$this->categoryFormProcces->add($form);
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

			}else{
				$this->flashMessage('Category does not exist.');
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}
}
