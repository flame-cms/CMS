<?php
/**
 * ImageCategoryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    22.11.12
 */

namespace Flame\CMS\AdminModule;

class ImageCategoryPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategory
	 */
	private $imageCategory;

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	private $imageCategoryFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory
	 */
	private $imageCategoryFormFactory;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory
	 */
	public function injectImageCategoryFormFactory(\Flame\CMS\AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory)
	{
		$this->imageCategoryFormFactory = $imageCategoryFormFactory;
	}

	/**
	 * @param \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	public function injectImageCategoryFacade(\Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade)
	{
		$this->imageCategoryFacade = $imageCategoryFacade;
	}

	public function actionEdit($id)
	{
		if(!$this->imageCategory = $this->imageCategoryFacade->getOne($id)){
			$this->flashMessage('Category does not exist!');
			$this->redirect('default');
		}
	}

	public function renderDefault()
	{
		$this->template->imageCategories = $this->imageCategoryFacade->getImageCategories();
	}

	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:ImageCategory', 'delete')){
			$this->flashMessage('Access denied!');
		}else{
			if(!$link = $this->imageCategoryFacade->getOne($id)){
				$this->flashMessage('Link does not exist');
			}else{
				$this->imageCategoryFacade->delete($link);
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('default');
		}
	}

	/**
	 * @return Forms\ImageCategories\ImageCategoryForm
	 */
	protected function createComponentImageCategoryForm()
	{
		$form = $this->imageCategoryFormFactory->configure($this->imageCategory)->createForm();

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$form->onSuccess[] = $this->lazyLink('default');
		}

		return $form;
	}
}
