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

	public function beforeRender()
	{
		parent::beforeRender();
	}

	public function handleSignOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('Sign:in');
		
	}
}
