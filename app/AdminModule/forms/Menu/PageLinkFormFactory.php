<?php
/**
 * PageLinkFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace AdminModule\Forms\Menu;

class PageLinkFormFactory extends \Flame\Application\FormFactory
{

	/**
	 * @var \Nette\Callback
	 */
	private $linkProvider;

	/**
	 * @var \Flame\CMS\Models\Pages\PageFacade $pageFacade
	 */
	private $pageFacade;

	/**
	 * @var \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	private $menuFacade;

	/**
	 * @param \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	public function injectMenuFacade(\Flame\CMS\Models\Menu\MenuFacade $menuFacade)
	{
		$this->menuFacade = $menuFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Pages\PageFacade $pageFacade
	 */
	public function injectPageFacade(\Flame\CMS\Models\Pages\PageFacade $pageFacade)
	{
		$this->pageFacade = $pageFacade;
	}

	/**
	 * @param $provider
	 */
	public function setLinkProvider($provider)
	{
		$this->linkProvider = callback($provider);
	}

	/**
	 * @return PageLinkForm|\Nette\Application\UI\Form
	 */
	public function createForm()
	{
		$form = new PageLinkForm();
		$form->setPages($this->pageFacade->getLastPages());
		$form->configure();
		$form->onSuccess[] = $this->formSubmitted;
		return $form;
	}

	/**
	 * @param PageLinkForm $form
	 * @throws \Nette\InvalidStateException
	 */
	public function formSubmitted(PageLinkForm $form)
	{
		$values = $form->getValues();

		if(!$this->linkProvider){
			throw new \Nette\InvalidStateException(__CLASS__ . '::$linkProvider is false. Please call method setLinkProvider');
		}

		if(count($values->pages)){
			foreach($values->pages as $pageId){
				$page = $this->pageFacade->getOne($pageId);
				$link = new \Flame\CMS\Models\Menu\Menu($page->getName(), $this->linkProvider->invoke(':Front:Page:detail', array('id' => $page->getId())));
				$this->menuFacade->save($link);
			}

			$form->presenter->flashMessage('Links was added!', 'success');
		}else{
			$form->presenter->flashMessage('No pages selected');
		}
	}
}
