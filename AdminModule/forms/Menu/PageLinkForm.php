<?php
/**
 * PageLinkForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Menu;

class PageLinkForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	/**
	 * @var mixed
	 */
	private $pages;

	/**
	 * @param $pages
	 * @return mixed
	 */
	public function setPages($pages)
	{
		return $this->pages = $pages;
	}

	public function configure()
	{
		if(count($this->pages)){
			$this->addMultiSelect('pages', 'Pages', $this->prepareForFormItem($this->pages))
				->setRequired();
		}else{
			$this->addMultiSelect('pages', 'Pages')
				->setRequired()
				->setOption('description', 'No available pages');
		}

		$this->addSubmit('send', 'Add');
	}

}
