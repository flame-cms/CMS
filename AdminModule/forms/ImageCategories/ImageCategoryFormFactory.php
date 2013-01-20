<?php
/**
 * IImageCategoryFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    22.11.12
 */

namespace Flame\CMS\AdminModule\Forms\ImageCategories;

use Flame\Utils\Strings;

class ImageCategoryFormFactory extends \Nette\Object
{


	/**
	 * @var ImageCategoryForm
	 */
	protected $form;

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategory
	 */
	private $imageCategory;

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	private $imageCategoryFacade;

	/**
	 * @param \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	public function injectImageCategoryFacade(\Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade)
	{
		$this->imageCategoryFacade = $imageCategoryFacade;
	}

	public function configure($imageCategory)
	{
		$this->imageCategory = $imageCategory;
		$this->form = new ImageCategoryForm($imageCategory ? $imageCategory->toArray() : array());
		$this->form->onSuccess[] = $this->formSubmitted;
		return $this;
	}

	/**
	 * @param ImageCategoryForm $form
	 */
	public function formSubmitted(ImageCategoryForm $form)
	{
		$values = $form->getValues();

		if($this->imageCategory){
			$this->imageCategory->setDescription($values->description)
				->setName($values->name)
				->setSlug(Strings::createSlug($values->slug));

			$this->imageCategoryFacade->save($this->imageCategory);
			$form->presenter->flashMessage('Category was edited', 'success');
		}else{
			$imageCategory = new \Flame\CMS\Models\ImageCategories\ImageCategory($values->name, Strings::createSlug($values->slug));
			$imageCategory->setDescription($values->description);

			$this->imageCategoryFacade->save($imageCategory);
			$form->presenter->flashMessage('Category was added', 'success');
		}

		if($form->presenter->isAjax())
			$form->restore();
	}

}
