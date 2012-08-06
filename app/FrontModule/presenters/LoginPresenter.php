<?php

namespace FrontModule;

use Nette\Security as NS,
    Flame\CMS\Forms\LoginForm;


class LoginPresenter extends FrontPresenter
{

    public function startup()
    {
        parent::startup();
        if($this->getUser()->isLoggedIn()){
            $this->redirect(':Admin:Dashboard:');
        }
    }

	protected function createComponentLoginForm()
	{
		$form = new LoginForm();
		$form->configure();
		$form->onSuccess[] = $this->loginFormSubmitted;
		return $form;
	}

	public function loginFormSubmitted(LoginForm $form)
	{

		try {
			$values = $form->getValues();
			if ($values->persistent) {
				$this->getUser()->setExpiration('+ 14 days', FALSE);
			} else {
				$this->getUser()->setExpiration('+ 20 minutes', TRUE);
			}
			$this->getUser()->login($values->email, $values->password);
			$this->redirect(':Admin:DashBoard:');

		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
