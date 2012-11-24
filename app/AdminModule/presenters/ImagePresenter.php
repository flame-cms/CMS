<?php

namespace AdminModule;

use Nette\Image;

/**
* Images presenter
*/
class ImagePresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Images\Image
	 */
	private $image;

	/**
	 * @var array
	 */
	private $imageStorage;

	/**
	 * @var \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	private $imageFacade;

	/**
	 * @var \Flame\CMS\Models\Users\UserFacade $userFacade
	 */
	private $userFacade;

	/**
	 * @var \Flame\Utils\FileManager $fileManager
	 */
	private $fileManager;

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
	 * @param \Flame\Utils\FileManager $fileManager
	 */
	public function injectFileManager(\Flame\Utils\FileManager $fileManager)
	{
		$this->fileManager = $fileManager;
	}

	/**
	 * @param \Flame\CMS\Models\Images\ImageFacade $imageFacade
	 */
	public function injectImageFacade(\Flame\CMS\Models\Images\ImageFacade $imageFacade)
	{
		$this->imageFacade = $imageFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Users\UserFacade $userFacade
	 */
	public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
	{
		$this->userFacade = $userFacade;
	}

	public function startup()
	{
		parent::startup();
		$this->imageStorage = $this->getContextParameter('imageStorage');
	}

	public function renderDefault()
	{
		$this->template->images = $this->imageFacade->getLastImages();
		$this->template->imageDir = $this->imageStorage['imageDir'];
	}

	public function actionEdit($id)
	{
		if(!$this->image = $this->imageFacade->getOne($id)){
			$this->flashMessage('Image dies not exist');
			$this->redirect('default');
		}

		$this->template->image = $this->image;
	}

	/**
	 * @return ImageForm
	 */
	protected function createComponentImageForm()
	{
		$f = new ImageForm($this->imageCategoryFacade->getImageCategories(), $this->image ? $this->image->toArray() : array());
		$f->onSuccess[] = $this->uploadImageSubmitted;

		return $f;
	}

	/**
	 * @param ImageForm $f
	 */
	public function uploadImageSubmitted(ImageForm $f)
	{
		$values = $f->getValues();

		if($this->image){
			$this->image->setDescription($values->description)
				->setName($values->name)
				->setPublic($values->public);

			if($category = $this->imageCategoryFacade->getOne($values->category)){
				$this->image->setCategory($category);
			}

			$this->imageFacade->save($this->image);

			$this->flashMessage('Image was edited', 'success');
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

			$this->flashMessage('Images was uploaded.', 'success');
		}

		$this->redirect('default');
	}

	public function handleDelete($id)
	{

		if(!$this->getUser()->isAllowed('Admin:Image', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$row = $this->imageFacade->getOne($id);

			if($row){

				$file = $this->imageStorage['baseDir'] .
					DIRECTORY_SEPARATOR .
					$this->imageStorage['imageDir'] .
					DIRECTORY_SEPARATOR . $row->file;

				if(file_exists($file)){
					unlink($file);
				}

				$this->imageFacade->delete($row);
			}else{
				$this->flashMessage('Required image to delete does not exist!');
			}
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('images');
		}
	}

	public function handlePublic($id)
	{

		if($image = $this->imageFacade->getOne($id)){
			$image->setPublic(!$image->getPublic());
			$this->imageFacade->save($image);
			$this->flashMessage('Public status changed', 'success');
		}else{
			$this->flashMessage('Image does not exist!');
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('images');
		}
	}
}
