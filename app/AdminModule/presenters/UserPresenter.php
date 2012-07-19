<?php

namespace AdminModule;

use Flame\Forms\UserForm,
    Nette\Security as NS,
    Flame\Models\Users\User,
	Flame\Forms\ChangePasswordForm;


class UserPresenter extends AdminPresenter
{
    private $userFacade;

    private $authenticator;

    public function __construct(\Flame\Models\Users\UserFacade $userFacade, \Flame\Security\Authenticator $authenticator)
    {
        $this->userFacade = $userFacade;
        $this->authenticator = $authenticator;
    }

	public function actionDefault()
	{
		$this->template->users = $this->userFacade->getLastUsers();
	}

	protected function createComponentAddUserForm()
	{
		$f = new UserForm();
		$f->configureAdd();
		$f->onSuccess[] = callback($this, 'addUserFormSubmitted');

        return $f;
	}

	public function addUserFormSubmitted(UserForm $form)
	{
		$values = $form->getValues();

		if($this->userFacade->getByUsername($values['username'])){
			$form->addError('Username exist yet.');
		}elseif($this->userFacade->getByEmail($values['email'])){
			$form->addError('Email exist yet.');
		}else{
			$user = new \Flame\Models\Users\User(
                $values['username'],
                $this->authenticator->calculateHash($values['password']),
                $values['role'],
                $values['email']
			);

			$user->setName($values['name']);
            $this->userFacade->persist($user);

			$this->flashMessage('User was added');
			$this->redirect('User:');
		}
	}

	protected function createComponentPasswordForm()
	{
		$form = new ChangePasswordForm();
		$form->configure();
		$form->onSuccess[] = callback($this, 'passwordFormSubmitted');

        return $form;
	}


	public function passwordFormSubmitted(ChangePasswordForm $form)
	{
		$values = $form->getValues();
		$user = $this->getUser();

		try {
			$this->authenticator->authenticate(array($user->getIdentity()->username, $values->oldPassword));

            $userEntity = $this->userFacade->getOne($user->getId());
            $this->authenticator->setPassword($userEntity, $values['newPassword']);

			$this->flashMessage('Password was changed.', 'success');
			$this->redirect('this');
		} catch (NS\AuthenticationException $e) {
			$form->addError('Invalid credentials');
		}
	}

	public function handleDelete($id)
	{
		if($this->getUser()->getId() == $id){
			$this->flashMessage('You cannot delete yourself');
		}elseif(!$this->getUser()->isAllowed('Admin:User', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$user = $this->userFacade->getOne((int) $id);

			if(!$user){
				$this->flashMessage('User with required ID does not exist');
			}else{
				$this->userFacade->delete($user);
			}
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('users');
		}
	}
}
