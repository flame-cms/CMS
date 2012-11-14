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

	/**
	 * @var \Flame\Components\LightGallery\LightGalleryControlFactory $lightGalleryControlFactory
	 */
	private $lightGalleryControlFactory;

	/**
	 * @var \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	private $imageFacade;

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

	protected function createComponentLightGallery()
	{
		$images = $this->imageFacade->getLastImages();
		return $this->lightGalleryControlFactory->create($images);
	}

}
