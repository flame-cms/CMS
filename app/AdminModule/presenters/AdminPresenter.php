<?php

namespace AdminModule;

abstract class AdminPresenter extends \Flame\Application\UI\SecuredPresenter
{

	/**
	 * @var \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory
	 */
	private $navbarBuilderControlFactory;

	/**
	 * @param \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory
	 */
	public function injectNavbarBuilderControlFactory(\Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory)
	{
		$this->navbarBuilderControlFactory = $navbarBuilderControlFactory;
	}

	public function startup()
	{
		parent::startup();

		if(!$this->getUser()->isAllowed($this->name, $this->view)){
			$this->flashMessage('Access denied', 'error');
			$this->redirect('Dashboard:');
		}
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$this->template->breadCrumbs = $this->generateBreadCrumb();
	}

	/**
	 * @return array
	 */
	protected function generateBreadCrumb()
	{
		$parts = explode(':', $this->name);
		$parts[] = $this->view;
		if($parameter = $this->getParameter('id')){
			$parts[] = $parameter;
		}
		return $parts;
	}

	/**
	 * @return \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	protected function createComponentNavbarBuilder()
	{
		$control = $this->navbarBuilderControlFactory->create();
		$control->setTitle('Dashboard', 'Dashboard:');
		$control->displayUserbar();

		$navbar = $control->getNavbarControl();

		$items = array(
			array('Posts', 'Post:'),
			array('List', 'Post:', 'Posts'),
			array('Add', 'Post:add', 'Posts'),
			array('Import', 'Import:', 'Posts', true),
			array('Categories', 'Category:', 'Posts', true),
			array('Tags', 'Tag:', 'Posts'),
			array('Comments', 'Comment:', 'Posts'),

			array('Newsreel', 'Newsreel:'),
			array('Images', 'Image:'),
			array('Pages', 'Page:'),
			array('Links', 'Link:'),

			array('Setting'),
			array('Options', 'Option:', 'Setting'),
			array('Users', 'User:', 'Setting'),
			array('Menu', 'Menu:', 'Setting'),

		);

		foreach($items as $item){
			if(isset($item[1])){
				$linkParts = explode(':', $item[1]);

				if($this->getUser()->isAllowed('Admin:' . $linkParts[0], $linkParts[1])){
					$navbar->addNavbarItem($item[0], $this->link($item[1]), (isset($item[2])) ? $item[2] : null, (isset($item[3])) ? $item[3] : false);
				}
			}else{
				$navbar->addNavbarItem($item[0], '.', null, false);
			}
		}

		$userbar = $control->getUserbarControl();
		$userbar->addItem('Account settings', $this->link('User:edit'));
		$userbar->addItem('Change password', $this->link('User:password'));
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}
}
