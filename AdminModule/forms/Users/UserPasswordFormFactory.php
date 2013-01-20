<?php
/**
 * UserPasswordFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    14.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Users;

class UserPasswordFormFactory extends \Nette\Object
{

	/**
	 * @var UserPasswordForm
	 */
	protected $form;

	/**
	 * @var \Nette\Security\User
	 */
	private $user;

	/**
	 * @var \Flame\CMS\Models\Users\UserFacade $userFacade
	 */
	private $userFacade;

	/**
	 * @var \Flame\CMS\Security\Authenticator $authenticator
	 */
	private $authenticator;

	/**
	 * @param \Flame\CMS\Security\Authenticator $authenticator
	 */
	public function injectAuthenticator(\Flame\CMS\Security\Authenticator $authenticator)
	{
		$this->authenticator = $authenticator;
	}

	/**
	 * @param \Flame\CMS\Models\Users\UserFacade $userFacade
	 */
	public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
	{
		$this->userFacade = $userFacade;
	}

	/**
	 * @param $user
	 * @return UserPasswordFormFactory
	 */
	public function configure($user)
	{
		$this->user = $user;

		$this->form = new UserPasswordForm();
		$this->form->configure();
		$this->form->onSuccess[] = $this->formSubmitted;
		return $this;
	}

	/**
	 * @param UserPasswordForm $form
	 */
	public function formSubmitted(UserPasswordForm $form)
	{
		$values = $form->getValues();

		try {
			$this->authenticator->authenticate(array($this->user->getIdentity()->email, $values->oldPassword));

			$userEntity = $this->userFacade->getOne($this->user->getId());
			$userEntity->setPassword($this->authenticator->calculateHash($values['newPassword']));
			$this->userFacade->save($userEntity);

			$form->presenter->flashMessage('Password was changed.', 'success');

		} catch (\Nette\Security\AuthenticationException $e) {
			$form->presenter->flashMessage('Invalid credentials');
		}
	}

}
