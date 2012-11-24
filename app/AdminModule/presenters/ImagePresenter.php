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
	 * @var \Flame\Utils\FileManager $fileManager
	 */
	private $fileManager;

	/**
	 * @var \AdminModule\Forms\Images\ImageFormFactory $imageFormFactory
	 */
	private $imageFormFactory;

	/**
	 * @param \AdminModule\Forms\Images\ImageFormFactory $imageFormFactory
	 */
	public function injectImageFormFactory(\AdminModule\Forms\Images\ImageFormFactory $imageFormFactory)
	{
		$this->imageFormFactory = $imageFormFactory;
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
		$form = $this->imageFormFactory->configure($this->image)->createForm();
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
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
