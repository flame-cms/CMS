<?php

namespace FrontModule;

use Nette\Security as NS,
    Flame\CMS\Forms\LoginForm;


class LoginPresenter extends FrontPresenter
{

	private $backlink;

    public function startup()
    {
        parent::startup();
        if($this->getUser()->isLoggedIn()){
            $this->redirect(':Admin:Dashboard:');
        }
    }

	public function actionDefault($backlink = null)
	{
		$this->backlink = $backlink;
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
				$this->getUser()->setExpiration('+ 3 hours', TRUE);
			}
			$this->getUser()->login($values->email, $values->password);


			if($this->backlink) $this->getApplication()->restoreRequest($this->backlink);

			$this->redirect(':Admin:DashBoard:');


		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
