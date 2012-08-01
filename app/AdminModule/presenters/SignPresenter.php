<?php

namespace AdminModule;

use Nette\Security as NS,
    Flame\Forms\SignInForm;


class SignPresenter extends \Flame\Application\UI\Presenter
{

    public function startup()
    {
        parent::startup();
        if($this->getUser()->isLoggedIn()){
            $this->redirect('Dashboard:');
        }
    }

	protected function createComponentSignInForm()
	{
		$form = new SignInForm();
		$form->configure();
		$form->onSuccess[] = $this->signInFormSubmitted;
		return $form;
	}

	public function signInFormSubmitted(SignInForm $form)
	{

		try {
			$values = $form->getValues();
			if ($values->persistent) {
				$this->getUser()->setExpiration('+ 14 days', FALSE);
			} else {
				$this->getUser()->setExpiration('+ 20 minutes', TRUE);
			}
			$this->getUser()->login($values->email, $values->password);
			$this->redirect('DashBoard:');

		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
