<?php

namespace FrontModule;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends FrontPresenter
{

	/**
	 * @var string|null
	 */
	private $backlink;

	/**
	 * @var \DoctrineSandbox\Forms\Sign\InFormFactory $inFormFactory
	 */
	private $inFormFactory;

	/**
	 * @param \DoctrineSandbox\Forms\Sign\InFormFactory $inFormFactory
	 */
	public function injectInFormFactory(\DoctrineSandbox\Forms\Sign\InFormFactory $inFormFactory)
	{
		$this->inFormFactory = $inFormFactory;
	}

	public function startup()
	{
		parent::startup();

		if($this->getUser()->isLoggedIn()){
			$this->redirect(':Admin:Dashboard:');
		}
	}

	/**
	 * @param null $backlink
	 */
	public function actionIn($backlink = null)
	{
		$this->backlink = $backlink;
	}

	/**
	 * Sign in form component factory.
	 * @return \DoctrineSandbox\Forms\Sign\InForm|\Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$this->inFormFactory->setPresenter($this);
		$this->inFormFactory->setBacklink($this->backlink);
		$form = $this->inFormFactory->createForm();
		$form->onSuccess[] = $this->lazyLink(':Admin:DashBoard:');
		return $form;
	}


}
