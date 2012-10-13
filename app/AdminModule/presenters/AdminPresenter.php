<?php

namespace AdminModule;

abstract class AdminPresenter extends \Flame\Application\UI\SecuredPresenter
{

	/**
	 * @param \Flame\Utils\PresentersList
	 */
	protected $presentersList;

	public function startup()
	{
		parent::startup();

		if(!$this->getUser()->isAllowed($this->name, $this->view)){
			$this->flashMessage('Access denied');
			$this->redirect('Dashboard:');
		}
	}

	/**
	 * @param \Flame\Utils\PresentersList $presentersList
	 */
	public function injectPresentersList(\Flame\Utils\PresentersList $presentersList)
	{
		$this->presentersList = $presentersList;
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$this->template->menuItems = $this->generateMenu();
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
	 * @return mixed
	 */
	protected function generateMenu()
	{

		$this->presentersList->load(__NAMESPACE__);
		$presenters = $this->presentersList->getPresenters();

		foreach($presenters as $k => $v){
			if($v == 'Admin') unset($presenters[$k]);
			if($v == 'Dashboard') unset($presenters[$k]);
			if($v == 'User') unset($presenters[$k]);
		}

		return $presenters;
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
}
