<?php

namespace AdminModule;

abstract class AdminPresenter extends \Flame\Application\UI\Presenter
{

	public function startup()
	{
		parent::startup();

		$user = $this->getUser();

		if(!$user->isLoggedIn()){
            $this->redirect('Sign:in');
		}else{
			if(!$user->isAllowed($this->name, $this->view)){
				$this->flashMessage('Access denied');
				$this->redirect('Dashboard:');
			}
		}
	}

	public function handleSignOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('Sign:in');

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
}
