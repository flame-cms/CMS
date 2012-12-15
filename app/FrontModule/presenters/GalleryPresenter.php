<?php
/**
 * GalleryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.11.12
 */

namespace FrontModule;

class GalleryPresenter extends FrontPresenter
{

	private $images;

	/**
	 * @var \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	private $imageFacade;

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	private $imageCategoryFacade;

	/**
	 * @var \Flame\Components\LightGallery\ILightGalleryControlFactory $lightGalleryControlFactory
	 */
	private $lightGalleryControlFactory;

	/**
	 * @param \Flame\Components\LightGallery\ILightGalleryControlFactory $lightGalleryControlFactory
	 */
	public function injectLightGalleryControlFactory(\Flame\Components\LightGallery\ILightGalleryControlFactory $lightGalleryControlFactory)
	{
		$this->lightGalleryControlFactory = $lightGalleryControlFactory;
	}

	/**
	 * @param \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	public function injectImageCategoryFacade(\Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade)
	{
		$this->imageCategoryFacade = $imageCategoryFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	public function injectImageFacade(\Flame\CMS\Models\Images\ImageFacade $imageFacade)
	{
		$this->imageFacade = $imageFacade;
	}

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
