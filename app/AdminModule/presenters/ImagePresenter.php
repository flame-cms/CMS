<?php

namespace AdminModule;

use Nette\Image;

/**
* Images presenter
*/
class ImagePresenter extends AdminPresenter
{

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

	public function createComponentUploadImageForm()
	{
		$f = new ImageForm();
		$f->configure();
		$f->onSuccess[] = callback($this, 'uploadImageSubmitted');

		return $f;
	}

	public function uploadImageSubmitted(ImageForm $f)
	{
		$values = $f->getValues();

		$image = new \Flame\CMS\Models\Images\Image($this->fileManager->saveFile($values['image']));

		$image->setName($values['name'])
			->setDescription($values['description']);

		$this->imageFacade->save($image);
		$this->flashMessage('Image was uploaded.');
		$this->redirect('Image:');
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
}
