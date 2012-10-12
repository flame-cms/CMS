<?php

namespace FrontModule;

abstract class FrontPresenter extends \Flame\Application\UI\Presenter
{

	/**
	 * @var string
	 */
	private $theme;

	/**
	 * @var \Flame\CMS\Models\Pages\PageFacade
	 */
	private $pageFacade;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade
	 */
	private $optionFacade;

	/**
	 * @var int
	 */
    private $itemsInMenu = 5;

	public function startup()
	{
		parent::startup();

		if(!$this->getUser()->isAllowed($this->name, $this->view)){
			$this->flashMessage('Access denied');
			$this->redirect('Homepage:');
		}

		$this->pageFacade = $this->context->PageFacade;
		$this->optionFacade = $this->context->OptionFacade;

		$this->theme = $this->context->ThemeManager->getTheme();
	}

	/**
	 * @return array
	 */
	public function formatLayoutTemplateFiles()
	{
		$list = parent::formatLayoutTemplateFiles();
		array_unshift($list, WWW_DIR . '/' .  $this->theme . "/@layout.latte");
		return $list;
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$option = $this->optionFacade->getOptionValue('menu_items');
		if(!is_null($option)) $this->itemsInMenu = $option;

		$this->template->name = $this->optionFacade->getOptionValue('name');
		$this->template->menus = $this->pageFacade->getLastPages($this->itemsInMenu);
		$this->template->theme = $this->theme;
	}

	/**
	 * @return \Flame\CMS\Components\Newsreel\Newsreel
	 */
	protected function createComponentNewsreelControl()
	{
		return new \Flame\CMS\Components\Newsreel\Newsreel($this, 'newsreelControl');
	}

	/**
	 * @return \Flame\CMS\Components\Categories\Category
	 */
	protected function createComponentCategoriesControl()
	{
		return new \Flame\CMS\Components\Categories\Category($this, 'categoriesControl');
	}

	/**
	 * @return \Flame\CMS\Components\Tags\Tag
	 */
	protected function createComponentTagsControl()
	{
		return new \Flame\CMS\Components\Tags\Tag($this, 'tagsControl');
	}


}
