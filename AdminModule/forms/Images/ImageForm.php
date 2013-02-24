<?php
/**
 * ImageForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    18.07.12
 */

namespace Flame\CMS\AdminModule\Forms\Images;

class ImageForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	/**
	 * @var array
	 */
	private $categories = array();

	/**
	 * @param array $categories
	 * @param array $defaults
	 */
	public function __construct(array $categories, array $defaults = array())
	{
		parent::__construct();

		$this->categories = $this->prepareForFormItem($categories);

		$this->addExtension('addMultiUpload', new \Flame\Forms\Controls\MultipleFileUpload());

		if(count($defaults)){
			$this->configureEdit();
			$this->setDefaults($defaults);
		}else{
			$this->configureUpload();
		}
	}

	private function configureUpload()
	{

		$this->addMultiUpload('images', 'Images')
			->addRule(self::FILLED)
			->addRule(self::IMAGE, 'Image must be JPEG, PNG or GIF')
			->addRule(self::MAX_FILE_SIZE, 'MAX file size is 5MB', 1024 * 5000/* 5MB in bytes */);

		$this->addSelect('category', 'Category', $this->categories)
			->setPrompt('-- Select one --');

		$this->addText('name', 'Name:')
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 250);

		$this->addCheckbox('public', 'Show in gallery?');

		$this->addSubmit('send', 'Upload image');
	}

	private function configureEdit()
	{

		$this->addText('file', 'File')
			->setDisabled()
			->setRequired();

		$this->addSelect('category', 'Category', $this->categories)
			->setPrompt('-- Select one --');

		$this->addText('name', 'Name:')
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addTextArea('description', 'Description')
			->addRule(self::MAX_LENGTH, null, 250);

		$this->addCheckbox('public', 'Show in gallery?');

		$this->addSubmit('send', 'Edit image');
	}

}
