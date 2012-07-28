<?php

class SignPresenter extends BasePresenter
{

    protected function createComponentSignInForm($name)
    {
        $form = new \Nette\Application\UI\Form($this, $name);

        $form->addPassword('password', 'Password:')
                ->setRequired('Please provide a password.');

        $form->addCheckbox('remember', 'Keep me signed in');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = callback($this, 'signInFormSubmitted');

        $form->setDefaults(array('remember'=>true));
        return $form;
    }

    public function signInFormSubmitted($form)
    {
        try {
            $values = $form->getValues();
            if ($values->remember) {
                $this->getUser()->setExpiration('+ 14 days', FALSE);
            } else {
                $this->getUser()->setExpiration('+ 20 minutes', TRUE);
            }
            $this->getUser()->login('default', $values->password);
            $this->redirect('Log:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }

    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('in');
    }

}