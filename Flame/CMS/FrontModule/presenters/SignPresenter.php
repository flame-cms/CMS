<?php

namespace Flame\CMS\FrontModule;

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
	 * @var \Flame\CMS\FrontModule\\Forms\Sign\InFormFactory $inFormFactory
	 */
	private $inFormFactory;

	/**
	 * @param \Flame\CMS\FrontModule\\Forms\Sign\InFormFactory $inFormFactory
	 */
	public function injectInFormFactory(\Flame\CMS\FrontModule\\Forms\Sign\InFormFactory $inFormFactory)
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
	 * @return \Flame\CMS\FrontModule\\Forms\Sign\InForm|\Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$this->inFormFactory->setRestoreRequestProvider($this->restoreRequest);
		$this->inFormFactory->setBacklink($this->backlink);
		$form = $this->inFormFactory->createForm();
		$form->onSuccess[] = $this->lazyLink(':Admin:DashBoard:');
		return $form;
	}


}
