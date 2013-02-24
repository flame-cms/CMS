<?php

namespace Flame\CMS\AdminModule;

abstract class AdminPresenter extends \Flame\Application\UI\SecuredPresenter
{

	/**
	 * @autowire
	 * @var \Flame\Components\NavbarBuilder\INavbarBuilderControlFactory
	 */
	protected $navbarBuilderControlFactory;

	public function startup()
	{
		parent::startup();

		if(!$this->getUser()->isAllowed($this->name, $this->view)){
			$this->flashMessage('Access denied', 'error');
			$this->redirect('Dashboard:');
		}
	}

	public function beforeRender()
	{
		parent::beforeRender();

		$this->template->breadCrumbs = $this->generateBreadCrumb();
	}

	/**
	 * @return array
	 */
	protected function generateBreadCrumb()
	{
		$parts = explode(':', $this->name);
		$parts[] = $this->view;
		if($parameter = $this->getParameter('id')){
			$parts[] = $parameter;
		}
		return $parts;
	}

	/**
	 * @return \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	protected function createComponentNavbarBuilder()
	{
		$control = $this->navbarBuilderControlFactory->create();
		$control->setTitle('Administration', 'Dashboard:');
		$control->displayUserbar();

		$navbar = $control->getNavbarControl();

		$items = $this->getNavItems();

		foreach($items as $item){
			if(!isset($item['label'])) continue;
			if(isset($item['link'])){
				$linkParts = explode(':', $item['link']);
				if(count($linkParts) < 2) continue;

				if($this->getUser()->isAllowed('Admin:' . $linkParts[0], $linkParts[1])){
					$navbar->addItem(
						$item['label'],
						$this->link($item['link']),
						(isset($item['parent'])) ? $item['parent'] : null,
						(isset($item['separated'])) ? $item['separated'] : false,
						(isset($item['icon'])) ? $item['icon'] : null
					);
				}
			}else{
				$navbar->addItem($item['label'], '.', null, false, (isset($item['icon'])) ? $item['icon'] : null);
			}
		}

		$userbar = $control->getUserbarControl();
		$userbar->addItem('Account settings', $this->link('User:edit'), 'icon-edit');
		$userbar->addItem('Change password', $this->link('User:password'), 'icon-lock');
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}

	/**
	 * @return array
	 */
	protected function getNavItems()
	{
		return array(
			array('label' => 'Posts'),
			array('label' => 'List', 'link' => 'Post:', 'parent' => 'Posts'),
			array('label' => 'Add', 'link' => 'Post:add', 'parent' => 'Posts'),
			array('label' => 'Import', 'link' => 'Import:', 'parent' => 'Posts', 'separated' => true),
			array('label' => 'Categories', 'link' => 'Category:', 'parent' => 'Posts','separated' =>  true),
			array('label' => 'Tags', 'link' => 'Tag:', 'parent' => 'Posts'),
			array('label' => 'Comments', 'link' => 'Comment:', 'parent' => 'Posts'),

			array('label' => 'Newsreel', 'link' => 'Newsreel:'),
			array('label' => 'Pages', 'link' => 'Page:'),
			array('label' => 'Links', 'link' => 'Link:'),

			array('label' => 'Images'),
			array('label' => 'List', 'link' => 'Image:', 'parent' => 'Images'),
			array('label' => 'Upload', 'link' => 'Image:upload', 'parent' => 'Images'),
			array('label' => 'Category', 'link' => 'ImageCategory:', 'parent' => 'Images'),

			array('label' => 'Setting'),
			array('label' => 'Options', 'link' => 'Option:', 'parent' => 'Setting'),
			array('label' => 'Users', 'link' => 'User:', 'parent' => 'Setting'),
			array('label' => 'Menu', 'link' => 'Menu:', 'parent' => 'Setting'),

		);
	}
}
