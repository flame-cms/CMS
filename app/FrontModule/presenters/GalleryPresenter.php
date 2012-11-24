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
	 * @var \Flame\Components\LightGallery\LightGalleryControlFactory $lightGalleryControlFactory
	 */
	private $lightGalleryControlFactory;

	/**
	 * @var \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	private $imageFacade;

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

	/**
	 * @param \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	public function injectImageFacade(\Flame\CMS\Models\Images\ImageFacade $imageFacade)
	{
		$this->imageFacade = $imageFacade;
	}

	/**
	 * @param \Flame\Components\LightGallery\LightGalleryControlFactory $lightGalleryControlFactory
	 */
	public function injectLightGalleryControlFactory(\Flame\Components\LightGallery\LightGalleryControlFactory $lightGalleryControlFactory)
	{
		$this->lightGalleryControlFactory = $lightGalleryControlFactory;
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
