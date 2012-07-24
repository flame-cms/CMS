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
		$form->onSuccess[] = callback($this, 'signInFormSubmitted');
		return $form;
	}

	public function signInFormSubmitted(SignInForm $form)
	{

		try {

			$user = $this->getUser();
			$values = $form->getValues();

			if ($values->persistent) {
				$user->setExpiration('+30 days', FALSE);
			}

			$user->login($values->email, $values->password);
			$this->flashMessage('Login was successful', 'success');
			$this->redirect('Dashboard:');

		} catch (NS\AuthenticationException $e) {
			$form->addError('Invalid username or password');
		}
	}

}
