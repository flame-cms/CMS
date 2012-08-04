<?php

namespace FrontModule;

abstract class FrontPresenter extends \Flame\Application\UI\Presenter
{

	private $pageFacade;

	private $optionFacade;

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
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$option = $this->optionFacade->getOptionValue('menu_items');
		if(!is_null($option)) $this->itemsInMenu = $option;

		$this->template->name = $this->optionFacade->getOptionValue('name');
		$this->template->menus = $this->pageFacade->getLastPages($this->itemsInMenu);

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
