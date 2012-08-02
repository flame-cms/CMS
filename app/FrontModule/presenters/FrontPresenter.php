<?php

namespace FrontModule;

abstract class FrontPresenter extends \Flame\Application\UI\Presenter
{

	private $optionFacade;

	private $pageFacade;

	private $newsreelFacade;

	private $categoryFacade;

	private $tagFacade;

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

	public function injectOptionFacade(\Flame\Models\Options\OptionFacade $optionFacade)
	{
		$this->optionFacade = $optionFacade;
	}

	public function injectPageFacade(\Flame\Models\Pages\PageFacade $pageFacade)
	{
		$this->pageFacade = $pageFacade;
	}

	public function injectNewsreelFacade(\Flame\Models\Newsreel\NewsreelFacade $newsreelFacade)
	{
		$this->newsreelFacade = $newsreelFacade;
	}

	public function injectCategoryFacade(\Flame\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
	}

	public function injectTagFacade(\Flame\Models\Tags\TagFacade $tagFacade)
	{
		$this->tagFacade = $tagFacade;
	}

    private function initGlobalParameters()
    {
        $option = $this->optionFacade->getOptionValue('menu_items');
        if(!is_null($option)) $this->itemsInMenu = $option;
    }

	public function beforeRender()
	{
		parent::beforeRender();
		$this->template->name = $this->optionFacade->getOptionValue('name');
		$this->template->menus = $this->pageFacade->getLastPages($this->itemsInMenu);

	}

	protected function createComponentNewsreelControl()
	{
        $itemsInNewsreelMenuList = $this->optionFacade->getOptionValue('menu_newsreel_count');

		$newsreel = new \Flame\Components\Newsreel\Newsreel($this->newsreelFacade);
        if(!is_null($itemsInNewsreelMenuList)) $newsreel->setCountOfItemsInNewsreel($itemsInNewsreelMenuList);

		return $newsreel;
	}

	protected function createComponentCategoriesControl()
	{
		return new \Flame\Components\Categories\Category($this->categoryFacade);
	}

	protected function createComponentTagsControl()
	{
		$countOfTags = $this->context->OptionFacade->getOptionValue('menu_tags_count');

		$tagControl = new \Flame\Components\Tags\Tag($this->tagFacade);
		if(!is_null($countOfTags)) $tagControl->setCountOfItems($countOfTags);

		return $tagControl;
	}
}
