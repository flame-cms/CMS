<?php
/**
 * InFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS\FrontModule\
 *
 * @date    01.09.12
 */

namespace Flame\CMS\FrontModule\Forms\Sign;

use Nette\Security as NS;

class InFormFactory extends \Nette\Object
{

	/**
	 * @var string|null
	 */
	private $backlink;

	/**
	 * @var \Nette\Security\User $user
	 */
	private $user;

	/**
	 * @var \Flame\CMS\FrontModule\SignPresenter
	 */
	private $restoreRequestProvider;

	/**
	 * @param $provider
	 */
	public function setRestoreRequestProvider($provider)
	{
		$this->restoreRequestProvider = \Nette\Callback::create($provider);
	}

	/**
	 * @param $backLink
	 */
	public function setBacklink($backLink)
	{
		$this->backlink = $backLink;
	}

	/**
	 * @param \Nette\Security\User $user
	 */
	public function injectUser(\Nette\Security\User $user)
	{
		$this->user = $user;
	}

	/**
	 * @return InForm|\Nette\Application\UI\Form
	 */
	public function createForm()
	{
		$form = new InForm();
		$form->configure();
		$form->onSuccess[] = $this->formSubmitted;
		return $form;
	}

	public function formSubmitted(InForm $form)
	{
		$values = $form->getValues();

		try {

			if ($values->remember) {
				$this->user->setExpiration('+ 14 days', false);
			} else {
				$this->user->setExpiration('+ 2 hours', true);
			}

			$this->user->login($values->email, $values->password);

			if($this->backlink and $this->restoreRequestProvider)
				$this->restoreRequestProvider->invoke($this->backlink);

		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
