<?php
/**
 * ImageCategoryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    22.11.12
 */

namespace AdminModule;

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
	 * @var \AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory
	 */
	private $imageCategoryFormFactory;

	/**
	 * @param \AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory
	 */
	public function injectImageCategoryFormFactory(\AdminModule\Forms\ImageCategories\ImageCategoryFormFactory $imageCategoryFormFactory)
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
