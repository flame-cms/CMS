<?php
/**
 * LinkPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package AdminModule
 *
 * @date    15.10.12
 */

namespace AdminModule;

class LinkPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Links\Link
	 */
	private $link;

	/**
	 * @var \AdminModule\Forms\Links\LinkFormFactory $linkFormFactory
	 */
	private $linkFormFactory;

	/**
	 * @var \Flame\CMS\Models\Links\LinkFacade $linkFacade
	 */
	private $linkFacade;

	/**
	 * @param \Flame\CMS\Models\Links\LinkFacade $linkFacade
	 */
	public function injectLinkFacade(\Flame\CMS\Models\Links\LinkFacade $linkFacade)
	{
		$this->linkFacade = $linkFacade;
	}

	/**
	 * @param \AdminModule\Forms\Links\LinkFormFactory $linkFormFactory
	 */
	public function injectLinkFormFactory(\AdminModule\Forms\Links\LinkFormFactory $linkFormFactory)
	{
		$this->linkFormFactory = $linkFormFactory;
	}

	public function renderDefault()
	{
		$this->template->links = $this->linkFacade->getLastLinks();
	}

	/**
	 * @param $id
	 */
	public function actionEdit($id)
	{
		if(!$this->link = $this->linkFacade->getOne($id)){
			$this->flashMessage('Required link does not exist!');
			$this->redirect('default');
		}

		$this->template->link = $this->link;
	}

	/**
	 * @param $id
	 */
	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Link', 'delete')){
			$this->flashMessage('Access denied!');
		}else{
			if(!$link = $this->linkFacade->getOne($id)){
				$this->flashMessage('Link does not exist');
			}else{
				$this->linkFacade->delete($link);
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('default');
		}
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentLinkForm()
	{
		$form = $this->linkFormFactory->configure($this->link)->createForm();
		if($this->link){
			$form->onSuccess[] = $this->lazyLink('default');
		}else{
			$form->onSuccess[] = $this->lazyLink('this');
		}

		return $form;
	}
}
