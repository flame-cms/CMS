<?php

namespace Flame\CMS\AdminModule;

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
	 * @var \Flame\CMS\AdminModule\Forms\Images\IImageFormFactory $imageFormFactory
	 */
	private $imageFormFactory;

	/**
	 * @var \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	private $imageCategoryFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Images\ImageFormProcess $imageFormProcess
	 */
	private $imageFormProcess;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Images\ImageFormProcess $imageFormProcess
	 */
	public function injectImageFormProcess(\Flame\CMS\AdminModule\Forms\Images\ImageFormProcess $imageFormProcess)
	{
		$this->imageFormProcess = $imageFormProcess;
	}

	/**
	 * @param \Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade
	 */
	public function injectImageCategoryFacade(\Flame\CMS\Models\ImageCategories\ImageCategoryFacade $imageCategoryFacade)
	{
		$this->imageCategoryFacade = $imageCategoryFacade;
	}

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Images\IImageFormFactory $imageFormFactory
	 */
	public function injectImageFormFactory(\Flame\CMS\AdminModule\Forms\Images\IImageFormFactory $imageFormFactory)
	{
		$this->imageFormFactory = $imageFormFactory;
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
		$this->template->publicImages = $this->imageFacade->getLastPublicImages();
		$this->template->unPublicImages = $this->imageFacade->getLastUnPublicImages();
		$this->template->imageDir = $this->imageStorage['baseDir'] . $this->imageStorage['imageDir'];
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
	 * @param Forms\Images\ImageForm $form
	 */
	public function formSubmitted(\Flame\CMS\AdminModule\Forms\Images\ImageForm $form)
	{
		if($this->image){
			$this->imageFormProcess->sendEdit($form, $this->image);
		}else{
			$this->imageFormProcess->sendUpload($form);
		}
	}

	public function handleDelete($id)
	{

		if(!$this->getUser()->isAllowed('Admin:Image', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$row = $this->imageFacade->getOne($id);

			if($row){
				$file = $this->imageStorage['baseDir'] . $row->file;
				$this->imageFacade->delete($row);
				\Flame\Tools\Files\FileSystem::rm($file, false);
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

	/**
	 * @return ImageForm
	 */
	protected function createComponentImageForm()
	{
		$form = $this->imageFormFactory->create(
			$this->imageCategoryFacade->getImageCategories(), $this->image ? $this->image->toArray() : array());

		$form->onSuccess[] = $this->formSubmitted;
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
	}

}
