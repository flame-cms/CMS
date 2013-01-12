<?php
/**
 * GalleryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.11.12
 */

namespace Flame\CMS\FrontModule;

class GalleryPresenter extends FrontPresenter
{

	/**
	 * @var array
	 */
	private $images;

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Images\ImageFacade
	 */
	protected $imageFacade;

	/**
	 * @autowire
	 * @var \Flame\Components\LightGallery\ILightGalleryControlFactory
	 */
	protected $lightGalleryControlFactory;

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategoryFacade
	 */
	protected $imageCategoryFacade;

	/**
	 * @param null $cat
	 */
	public function actionDefault($cat = null)
	{
		if($cat and $category = $this->imageCategoryFacade->getOne($cat)){
			$this->images = $this->imageFacade->getLastPublicImagesByCategory($category);
		}else{
			$this->images = $this->imageFacade->getLastPublicImages();
		}

		$this->template->categories = $this->imageCategoryFacade->getImageCategories();

	}

	/**
	 * @return \Flame\Components\LightGallery\LightGalleryControl
	 */
	protected function createComponentLightGallery()
	{
		return $this->lightGalleryControlFactory->create($this->images);
	}

}
