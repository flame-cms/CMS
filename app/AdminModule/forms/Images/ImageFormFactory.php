<?php
/**
 * ImageFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    24.11.12
 */

namespace AdminModule\Forms\Images;

class ImageFormFactory extends \Flame\Application\FormFactory
{


	protected $form;

	/**
	 * @var \Flame\CMS\Models\Images\Image
	 */
	private $image;

	/**
	 * @var \Flame\Utils\FileManager $fileManager
	 */
	private $fileManager;

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
	 * @param \Flame\Utils\FileManager $fileManager
	 */
	public function injectFileManager(\Flame\Utils\FileManager $fileManager)
	{
		$this->fileManager = $fileManager;
	}

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

	public function configure($image)
	{
		$this->image = $image;

		$this->form = new ImageForm($this->imageCategoryFacade->getImageCategories(), $this->image ? $this->image->toArray() : array());
		$this->form->onSuccess[] = $this->uploadImageSubmitted;
		return $this;
	}

	/**
	 * @param ImageForm $form
	 */
	public function uploadImageSubmitted(ImageForm $form)
	{
		$values = $form->getValues();

		if($this->image){
			$this->image->setDescription($values->description)
				->setName($values->name)
				->setPublic($values->public);

			if($category = $this->imageCategoryFacade->getOne($values->category)){
				$this->image->setCategory($category);
			}

			$this->imageFacade->save($this->image);

			$form->presenter->flashMessage('Image was edited', 'success');
		}else{

			if(count($values->images)){
				foreach($values->images as $image){
					$imageModel = new \Flame\CMS\Models\Images\Image($this->fileManager->saveFile($image));
					$imageModel->setName($values->name)
						->setDescription($values->description)
						->setPublic($values->public);

					if($category = $this->imageCategoryFacade->getOne($values->category)){
						$imageModel->setCategory($category);
					}

					$this->imageFacade->save($imageModel);
				}
			}

			$form->presenter->flashMessage('Images was uploaded.', 'success');
		}
	}

}
