<?php
/**
 * ImageForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    18.07.12
 */

namespace AdminModule;

class ImageForm extends \Flame\CMS\Application\UI\Form
{

	public function configure()
	{
		$this->addExtension('addMultiUpload', new \Flame\Forms\Controls\MultipleFileUpload());

		$this->addMultiUpload('images', 'Images')
			->addRule(self::FILLED)
			->addRule(self::IMAGE, 'Image must be JPEG, PNG or GIF')
			->addRule(self::MAX_FILE_SIZE, 'MAX file size is 5MB', 1024 * 5000/* 5MB in bytes */);

		$this->addText('name', 'Name:')
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 250);

		$this->addCheckbox('public', 'Show in gallery?');

		$this->addSubmit('upload', 'Upload image');
	}

}
