<?php

namespace FrontModule;

abstract class FrontPresenter extends \Flame\Application\UI\Presenter
{

    private $itemsInMenu = 5;

	public function startup()
	{
		parent::startup();

		if(!$this->getUser()->isAllowed($this->name, $this->view)){
			$this->flashMessage('Access denied');
			$this->redirect('Homepage:');
		}

        $this->initGlobalParameters();
	}

    private function initGlobalParameters()
    {
        $option = $this->context->OptionFacade->getOptionValue('menu_items');
        if(!is_null($option)) $this->itemsInMenu = $option;
    }

	public function beforeRender()
	{
		parent::beforeRender();
		$this->template->name = $this->context->OptionFacade->getOptionValue('name');
		$this->template->menus = $this->context->PageFacade->getLastPages($this->itemsInMenu);

	}

	protected function createComponentNewsreelControl()
	{
        $itemsInNewsreelMenuList = $this->context->OptionFacade->getOptionValue('menu_newsreel_count');

		$newsreel = new \Flame\Components\Newsreel\Newsreel($this->context->NewsreelFacade);
        if(!is_null($itemsInNewsreelMenuList)) $newsreel->setCountOfItemsInNewsreel($itemsInNewsreelMenuList);

		return $newsreel;
	}

	protected function createComponentCategoriesControl()
	{
		return new \Flame\Components\Categories\Category($this->context->CategoryFacade);
	}

	protected function createComponentTagsControl()
	{
		$countOfTags = $this->context->OptionFacade->getOptionValue('menu_tags_count');

		$tagControl = new \Flame\Components\Tags\Tag($this->context->TagFacade);
		if(!is_null($countOfTags)) $tagControl->setCountOfItems($countOfTags);

		return $tagControl;
	}
}
