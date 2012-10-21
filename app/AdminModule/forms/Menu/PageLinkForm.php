<?php
/**
 * PageLinkForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace AdminModule\Forms\Menu;

class PageLinkForm extends \Flame\CMS\Application\UI\Form
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
		$this->addMultiSelect('pages', 'Pages', $this->prepareForFormItem($this->pages))
			->setRequired();
		$this->addSubmit('send', 'Add');
	}

}
