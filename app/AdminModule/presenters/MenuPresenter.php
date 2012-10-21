<?php
/**
 * MenuPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace AdminModule;

class MenuPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	private $menuFacade;

	/**
	 * @var \Flame\CMS\Models\Menu\Menu
	 */
	private $menuLink;

	/**
	 * @var \AdminModule\Forms\Menu\RawLinkFormFactory $rawLinkFormFactory
	 */
	private $rawLinkFormFactory;

	/**
	 * @var \AdminModule\Forms\Menu\PageLinkFormFactory $pageLinkFormFactory
	 */
	private $pageLinkFormFactory;

	/**
	 * @param \AdminModule\Forms\Menu\PageLinkFormFactory $pageLinkFormFactory
	 */
	public function injectPageLinkFormFactory(\AdminModule\Forms\Menu\PageLinkFormFactory $pageLinkFormFactory)
	{
		$this->pageLinkFormFactory = $pageLinkFormFactory;
	}

	/**
	 * @param \AdminModule\Forms\Menu\RawLinkFormFactory $rawLinkFormFactory
	 */
	public function injectAddLinkFormFactory(\AdminModule\Forms\Menu\RawLinkFormFactory $rawLinkFormFactory)
	{
		$this->rawLinkFormFactory = $rawLinkFormFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	public function injectMenuFacade(\Flame\CMS\Models\Menu\MenuFacade $menuFacade)
	{
		$this->menuFacade = $menuFacade;
	}

	public function renderDefault()
	{
		$this->template->links = $this->menuFacade->getLastMenuLinks();
	}

	/**
	 * @param $id
	 */
	public function actionEditLink($id)
	{
		if(!$this->menuLink = $this->menuFacade->getOne($id)){
			$this->flashMessage('Link does not exist!');
			$this->redirect('default');
		}

		$this->template->link = $this->menuLink;
	}

	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Menu', 'delete')){
			$this->flashMessage('Access denied!');
		}else{
			if(!$menuLink = $this->menuFacade->getOne($id)){
				$this->flashMessage('Link does not exist');
			}else{
				$this->menuFacade->delete($menuLink);
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('default');
		}
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentRawLinkForm()
	{
		$form = $this->rawLinkFormFactory->configure($this->menuLink)->createForm();
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
	}

	/**
	 * @return Forms\Menu\PageLinkForm|\Nette\Application\UI\Form
	 */
	protected function createComponentPageLinkForm()
	{

		$this->pageLinkFormFactory->setLinkProvider($this->link);
		$form = $this->pageLinkFormFactory->createForm();
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
	}

}
