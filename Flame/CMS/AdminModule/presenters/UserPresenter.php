<?php

namespace Flame\CMS\AdminModule;

use Flame\CMS\Models\Users\User;

class UserPresenter extends AdminPresenter
{

    /**
     * @var \Flame\CMS\Models\Users\User
     */
    private $user;

    /**
     * @var \Flame\CMS\Models\Users\UserFacade
     */
    private $userFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Users\UserEditFormFactory $userEditFormFactory
	 */
	private $userEditFormFactory;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Users\UserAddFormFactory $userAddFormFactory
	 */
	private $userAddFormFactory;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Users\UserPasswordFormFactory $userPasswordFormFactory
	 */
	private $userPasswordFormFactory;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Users\UserPasswordFormFactory $userPasswordFormFactory
	 */
	public function injectUserPasswordFormFactory(\Flame\CMS\AdminModule\Forms\Users\UserPasswordFormFactory $userPasswordFormFactory)
	{
		$this->userPasswordFormFactory = $userPasswordFormFactory;
	}

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Users\UserAddFormFactory $userAddFormFactory
	 */
	public function injectUserAddFormFactory(\Flame\CMS\AdminModule\Forms\Users\UserAddFormFactory $userAddFormFactory)
	{
		$this->userAddFormFactory = $userAddFormFactory;
	}

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Users\UserEditFormFactory $userEditFormFactory
	 */
	public function injectUserEditFormFactory(\Flame\CMS\AdminModule\Forms\Users\UserEditFormFactory $userEditFormFactory)
	{
		$this->userEditFormFactory = $userEditFormFactory;
	}

    /**
     * @param \Flame\CMS\Models\Users\UserFacade $userFacade
     */
    public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

	public function renderDefault()
	{
		$this->template->users = $this->userFacade->getLastUsers();
	}

    /**
     * @param $id
     */
    public function actionEdit($id = null)
	{
		if($id === null) $id = $this->getUser()->getId();

		if(!$this->getUser()->isAllowed('Admin:User', 'editAnother')){
			if(!$this->user = $this->userFacade->getOne($id)){
				$this->flashMessage('User does not exist or you dont have permission');
				$this->redirect('Dashboard:');
			}
		}

		$this->user = $this->userFacade->getOne($id);

	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentUserEditForm()
	{
		$form = $this->userEditFormFactory->configure($this->user)->createForm();
		$form->onSuccess[] = $this->lazyLink('this');
		return $form;
	}


	/**
	 * @return Forms\Users\UserAddForm|\Nette\Application\UI\Form
	 */
	protected function createComponentUserAddForm()
	{
		$form = $this->userAddFormFactory->createForm();
		$form->onSuccess[] = $this->lazyLink('default');
		return $form;
	}

    /**
     * @return ChangePasswordForm
     */
    protected function createComponentUserPasswordForm()
	{
		$form = $this->userPasswordFormFactory->configure($this->getUser())->createForm();
		$form->onSuccess[] = $this->lazyLink('Dashboard:');
        return $form;
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
