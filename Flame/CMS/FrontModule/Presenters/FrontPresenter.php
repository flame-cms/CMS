<?php

namespace Flame\CMS\FrontModule\Presenters;

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
	 * @var \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory
	 */
	private $navbarBuilderControlFactory;

	/**
	 * @var \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	private $menuFacade;

	/**
	 * @var \Flame\CMS\Components\Tags\TagControlFactory $tagControlFactory
	 */
	private $tagControlFactory;

	/**
	 * @var \Flame\CMS\Components\Newsreel\NewsreelControlFactory $newsreelControlFactory
	 */
	private $newsreelControlFactory;

	/**
	 * @var \Flame\CMS\Components\Categories\CategoryControlFactory $categoryControlFactory
	 */
	private $categoryControlFactory;

	public function startup()
	{
		parent::startup();

//		if(!$this->getUser()->isAllowed($this->name, $this->view)){
//			$this->flashMessage('Access denied', 'error');
//			$this->redirect('Homepage:');
//		}

		$this->pageFacade = $this->context->PageFacade;
		$this->menuFacade = $this->context->MenuFacade;
		$this->optionFacade = $this->context->OptionFacade;

		$this->navbarBuilderControlFactory = $this->context->NavbarBuilderControlFactory;
		$this->tagControlFactory = $this->context->TagControlFactory;
		$this->newsreelControlFactory = $this->context->NewsreelControlFactory;
		$this->categoryControlFactory = $this->context->CategoryControlFactory;

		$this->theme = $this->context->ThemeManager->getTheme();
	}

	/**
	 * @return array
	 */
	public function formatLayoutTemplateFiles()
	{
		$list = parent::formatLayoutTemplateFiles();
		$wwwDir = $this->getContextParameter('wwwDir');
		array_unshift($list, $wwwDir . DIRECTORY_SEPARATOR . $this->theme . "/@layout.latte");
		return $list;
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$this->template->name = $this->optionFacade->getOptionValue('Name');
		$this->template->theme = $this->theme;
	}

	/**
	 * @return \Flame\CMS\Components\Newsreel\NewsreelControl
	 */
	protected function createComponentNewsreelControl()
	{
		$this->newsreelControlFactory->setLimit($this->optionFacade->getOptionValue('Menu:NewsreelCount'));
		return $this->newsreelControlFactory->create();
	}

	/**
	 * @return \Flame\CMS\Components\Categories\CategoryControl
	 */
	protected function createComponentCategoriesControl()
	{
		return $this->categoryControlFactory->create();
	}

	/**
	 * @return \Flame\CMS\Components\Tags\TagControl
	 */
	protected function createComponentTagsControl()
	{
		return $this->tagControlFactory->create();
	}

	/**
	 * @return \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	protected function createComponentNavbar()
	{
		$control = $this->navbarBuilderControlFactory->create();

		$navbar = $control->getNavbarControl();

		if(count($items = $this->menuFacade->getLastMenuLinkByPriority())){
			foreach($items as $item){
				$navbar->addNavbarItem($item->title, $item->url);
			}
		}

		return $control;
	}


}
