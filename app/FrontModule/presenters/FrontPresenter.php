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
        $option = $this->context->OptionFacade->getOptionValue('items_in_menu');
        if(!is_null($option)) $this->itemsInMenu = $option;
    }

	public function beforeRender()
	{
		parent::beforeRender();
		$this->template->menus = $this->context->PageFacade->getLastPages($this->itemsInMenu);

	}

	protected function createComponentNewsreelControl()
	{
        $itemsInNewsreelMenuList = $this->context->OptionFacade->getOptionValue('items_in_newsreel_menu_list');

		$newsreel = new \Flame\Components\NewsreelControl($this->context->NewsreelFacade);
        if(!is_null($itemsInNewsreelMenuList)) $newsreel->setCountOfItemsInNewsreel($itemsInNewsreelMenuList);

		return $newsreel;
	}

	protected function createComponentCategoriesControl()
	{
		return new \Flame\Components\CategoriesControl($this->context->CategoryFacade);
	}

	protected function createComponentTagsControl()
	{
		return new \Flame\Components\TagControl($this->context->TagFacade);
	}
}
