<?php

namespace AdminModule;

use Flame\CMS\Models\Users\User;

class UserPresenter extends AdminPresenter
{
    /**
     * @var id
     */
    private $id;

    /**
     * @var \Flame\CMS\Models\Users\User
     */
    private $user;

    /**
     * @var \Flame\CMS\Models\Users\UserFacade
     */
    private $userFacade;

    /**
     * @var \Flame\CMS\Models\UsersInfo\UserInfoFacade
     */
    private $userInfoFacade;

    /**
     * @var \Flame\CMS\Security\Authenticator
     */
    private $authenticator;

    /**
     * @param \Flame\CMS\Models\Users\UserFacade $userFacade
     */
    public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    /**
     * @param \Flame\CMS\Security\Authenticator $authenticator
     */
    public function injectAuthenticator(\Flame\CMS\Security\Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    /**
     * @param \Flame\CMS\Models\UsersInfo\UserInfoFacade $userInfoFacade
     */
    public function injectUserInfo(\Flame\CMS\Models\UsersInfo\UserInfoFacade $userInfoFacade)
    {
        $this->userInfoFacade = $userInfoFacade;
    }

	public function renderDefault()
	{
		$this->template->users = $this->userFacade->getLastUsers();
	}

    /**
     * @param $id
     */
    public function actionEdit($id)
	{
		$this->id = $id;

		if($this->getUser()->getId() != $id or !$this->getUser()->isAllowed('Admin:User', 'editAnother')){
			$this->flashMessage('Access denied');
			$this->redirect('Dashboard:');
		}else{
			if($user = $this->userFacade->getOne($id)){
				$this->user = $user;
			}else{
				$this->flashMessage('User does not exist!');
				$this->redirect('Dashboard:');
			}
		}

	}

    /**
     * @return UserForm
     */
    protected function createComponentEditUserForm()
	{
		$form = new UserForm();

		$userInfo = $this->user->getInfo();
		$default = array_merge(
			array('email' => $this->user->getEmail()),
			$userInfo ? $userInfo->toArray() : array()
		);

		$form->configureEditFull($default);
		$form->onSuccess[] = callback($this, 'userEditFormSubmitted');
		return $form;
	}


    /**
     * @return UserForm
     */
    protected function createComponentAddUserForm()
	{
		$f = new UserForm();
		$f->configureRoles();
		$f->configureAdd();
		$f->onSuccess[] = callback($this, 'userAddFormSubmitted');

        return $f;
	}

    /**
     * @param UserForm $form
     * @throws \Nette\Application\BadRequestException
     */
    public function userEditFormSubmitted(UserForm $form)
	{
		if($this->id and !$this->user){
			throw new \Nette\Application\BadRequestException;
		}

		$values = $form->getValues();


		if($info = $this->user->getInfo()){
			$info->setName($values['name'])
				->setAbout($values['about'])
				->setBirthday($values['birthday'])
				->setWeb($values['web'])
				->setFacebook($values['facebook'])
				->setTwitter($values['twitter']);
			$this->userInfoFacade->save($info);
		}else{
			$info = new \Flame\CMS\Models\UsersInfo\UserInfo($values['name']);
			$info->setAbout($values['about'])
				->setBirthday($values['birthday'])
				->setWeb($values['web'])
				->setFacebook($values['facebook'])
				->setTwitter($values['twitter']);
			$this->userInfoFacade->save($info);
			$this->user->setInfo($info);
			$this->userFacade->save($this->user);
		}

		$this->flashMessage('User was edited');
		$this->redirect('this');


	}

    /**
     * @param UserForm $form
     */
    public function userAddFormSubmitted(UserForm $form)
	{
		$values = $form->getValues();


		if($this->userFacade->getByEmail($values['email'])){
			$form->addError('Email ' . $values['email'] . ' exist.');
		}else{
			$user = new \Flame\CMS\Models\Users\User(
				$values['email'],
				$this->authenticator->calculateHash($values['password']),
				$values['role']
			);

			$this->userFacade->save($user);

			$this->flashMessage('User was added');
			$this->redirect('User:');
		}

	}

    /**
     * @return ChangePasswordForm
     */
    protected function createComponentPasswordForm()
	{
		$form = new ChangePasswordForm();
		$form->configure();
		$form->onSuccess[] = callback($this, 'passwordFormSubmitted');

        return $form;
	}

    /**
     * @param ChangePasswordForm $form
     */
    public function passwordFormSubmitted(ChangePasswordForm $form)
	{
		$values = $form->getValues();
		$user = $this->getUser();

		try {
			$this->authenticator->authenticate(array($user->getIdentity()->email, $values->oldPassword));

            $userEntity = $this->userFacade->getOne($user->getId());
            $userEntity->setPassword($this->authenticator->calculateHash($values['newPassword']));
			$this->userFacade->save($userEntity);

			$this->flashMessage('Password was changed.', 'success');
			$this->redirect('this');
		} catch (\Nette\Security\AuthenticationException $e) {
			$form->addError('Invalid credentials');
		}
	}

    /**
     * @param $id
     */
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
