<?php

namespace AdminModule;

abstract class AdminPresenter extends \Flame\Application\UI\SecuredPresenter
{

	/**
	 * @param \Flame\Utils\PresentersList
	 */
	protected $presentersList;

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

	/**
	 * @param \Flame\Utils\PresentersList $presentersList
	 */
	public function injectPresentersList(\Flame\Utils\PresentersList $presentersList)
	{
		$this->presentersList = $presentersList;
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

		$this->presentersList->load(__NAMESPACE__);
		$presenters = $this->presentersList->getPresenters();

		foreach($presenters as $k => $v){
			if($v !== 'Admin' and $v !== 'Dashboard'){
				$navbar->addNavbarItem($v, $v . ':');
			}
		}

		$userbar = $control->getUserbarControl();

		$userbar->addItem('Account settings', 'User:edit');
		$userbar->addItem('Password edit', 'User:password');
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}
}
