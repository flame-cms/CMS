<?php

namespace AdminModule;

use Nette\Image,
	Flame\Forms\ImageForm;

/**
* Images presenter
*/
class ImagePresenter extends AdminPresenter
{
	private $imageFacade;

	private $userFacade;

	private $imageStorage;

	public function __construct(\Flame\Models\Images\ImageFacade $imageFacade, \Flame\Models\Users\UserFacade $userFacade)
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

		$image = new \Flame\Models\Images\Image(
			$this->userFacade->getOne($this->getUser()->getId()), $this->saveImage($values['image']));

		$image->setName($values['name'])
			->setDescription($values['description']);

		$this->imageFacade->persist($image);
		$this->flashMessage('Image was uploaded.');
		$this->redirect('Image:');
	}

	private function saveImage($file)
	{
		$name = $file->name;
		$path = $this->imageStorage['baseDir'] .
			DIRECTORY_SEPARATOR .
			$this->imageStorage['imageDir'] .
			DIRECTORY_SEPARATOR . $name;
		
		if(!file_exists($path)){
			$file->move($path);
		}else{
			$new_name = $this->getRandomImagePrefix() . '_' . $name;
			$file->move(str_replace($name, $new_name, $path));
			$name = $new_name;

		}
		return $name;
	}

	private function getRandomImagePrefix()
	{
		//$charset = 'abcdefghijklmnopqrstuvwxyz012345678901234567890123456789';
		$charset = uniqid('', false);
		$str = "";

		for($i=0;$i< 6;$i++) {
			$pos = mt_rand(0, strlen($charset)-1);
			$str .= $charset[$pos];
		}

		return $str;
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
?>