<?php

namespace AdminModule;

use Nette\Image;

/**
* Images presenter
*/
class ImagePresenter extends AdminPresenter
{
	private $imageFacade;

	private $userFacade;

	private $imageStorage;

	public function __construct(\Flame\CMS\Models\Images\ImageFacade $imageFacade, \Flame\CMS\Models\Users\UserFacade $userFacade)
	{
		$this->imageFacade = $imageFacade;
		$this->userFacade = $userFacade;
	}

	public function startup()
	{
		parent::startup();
		$params = $this->context->getParameters();
		$this->imageStorage = $params['imageStorage'];
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

		$image = new \Flame\CMS\Models\Images\Image($this->saveImage($values['image']));

		$image->setName($values['name'])
			->setDescription($values['description']);

		$this->imageFacade->persist($image);
		$this->flashMessage('Image was uploaded.');
		$this->redirect('Image:');
	}

	private function saveImage($file)
	{
		$name = $file->name;
		$folder = $this->imageStorage['baseDir'] . DIRECTORY_SEPARATOR . $this->imageStorage['imageDir'];
		$imagePath = $folder . DIRECTORY_SEPARATOR . $name;

		$this->createFolder($folder);

		if(!file_exists($imagePath)){
			$file->move($imagePath);
		}else{
			$new_name = $this->getRandomImagePrefix() . '_' . $name;
			$file->move(str_replace($name, $new_name, $imagePath));
			$name = $new_name;

		}
		return $name;
	}

	private function createFolder($path)
	{
		if(!file_exists($path)){
			return @mkdir($path, 0777, true);
		}

		return true;
	}

	private function getRandomImagePrefix()
	{
		return md5(uniqid(microtime(), true));
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
