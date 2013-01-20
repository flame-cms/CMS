<?php
/**
 * AddLinkFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Menu;

class RawLinkFormFactory extends \Nette\Object
{

	/**
	 * @var rawLinkForm
	 */
	protected $form;

	/**
	 * @var \Flame\CMS\Models\Menu\Menu
	 */
	protected $link;

	/**
	 * @var \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	private $menuFacade;

	/**
	 * @param \Flame\CMS\Models\Menu\MenuFacade $menuFacade
	 */
	public function injectMenuFacade(\Flame\CMS\Models\Menu\MenuFacade $menuFacade)
	{
		$this->menuFacade = $menuFacade;
	}

	/**
	 * @param $link
	 * @return RawLinkFormFactory
	 */
	public function configure($link)
	{
		$this->link = $link;
		$this->form = new RawLinkForm();

		if($this->link){
			$this->form->configureEdit($this->link ? $this->link->toArray() : array());
		}else{
			$this->form->configureAdd();
		}

		$this->form->onSuccess[] = $this->formSubmitted;
		return $this;
	}

	/**
	 * @param RawLinkForm $form
	 */
	public function formSubmitted(RawLinkForm $form)
	{
		$values = $form->getValues();

		if($this->link){
			$this->link->setPriority($values->priority)
				->setTitle($values->title)
				->setUrl($values->url);
			$this->menuFacade->save($this->link);
			$form->presenter->flashMessage('Link was edited!', 'success');
		}else{
			$link = new \Flame\CMS\Models\Menu\Menu($values->title, $values->url);
			$link->setPriority($values->priority);
			$this->menuFacade->save($link);
			$form->presenter->flashMessage('Menu link was added!', 'success');
		}
	}

}
