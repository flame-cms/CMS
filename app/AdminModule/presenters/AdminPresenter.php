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
			$this->flashMessage('Access denied');
			$this->redirect('Dashboard:');
		}
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$this->template->breadCrumbs = $this->generateBreadCrumb();
	}

	protected function createSlug($name)
	{
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $name);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strToLower($url);
		$url = preg_replace('~[^-a-z0-9_]+~', '', $url);

		return $url;
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
			array('Options', 'Option:'),
			array('Users', 'User:'),
		);

		foreach($items as $item){
			$linkParts = explode(':', $item[1]);

			if($this->getUser()->isAllowed('Admin:' . $linkParts[0], $linkParts[1])){
				$navbar->addNavbarItem($item[0], $item[1], (isset($item[2])) ? $item[2] : null, (isset($item[3])) ? $item[3] : false);
			}
		}

		$userbar = $control->getUserbarControl();
		$userbar->addItem('Account settings', 'User:edit');
		$userbar->addItem('Change password', 'User:password');
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}
}
