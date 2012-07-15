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

use Nette\Application\UI\Form;

class CategoryPresenter extends AdminPresenter
{

	private $id;

	private $category;

	private $categoryFacade;

	public function __construct(\Flame\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
	}

	public function renderDefault()
	{
		$this->template->categories = $this->categoryFacade->getLastCategories();
	}

	public function actionEdit($id)
	{
		$this->id = $id;

		if(!$this->category = $this->categoryFacade->getOne($id)){
			$this->flashMessage('Category does not exist!');
			$this->redirect('Category:');
		}
	}

	protected function createComponentCategoryForm()
	{
		$f = new \Flame\Forms\CategoryForm();

		if($this->id){
			$f->configureEdit($this->category->toArray());
		}else{
			$f->configureAdd();
		}

		$f->onSuccess[] = callback($this, 'categoryFormSubmitted');

		return $f;
	}

	public function categoryFormSubmitted(Form $form)
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
			$this->categoryFacade->persist($this->category);
			$this->flashMessage('Category was edited');

		}else{

			if($this->categoryFacade->getOneByName($values['name'])){
				$this->flashMessage('Category with name "' . $values['name'] . '" exist.');
			}else{
				$category = new \Flame\Models\Categories\Category($values['name'], $values['description'], $slug);
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

	private function createSlug($name)
	{
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $name);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strToLower($url);
		$url = preg_replace('~[^-a-z0-9_]+~', '', $url);

		return $url;
	}

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
