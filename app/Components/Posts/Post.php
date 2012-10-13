<?php

namespace Flame\CMS\Components\Posts;

class Post extends \Flame\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var bool
	 */
	private $onlyPublish;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade
	 */
	private $optionFacade;

	/**
	 * @var int
	 */
	private $itemsPerPage = 10;

	/**
	 * @param \Nette\ComponentModel\IContainer $parent
	 * @param null $name
	 * @param bool $onlyPublish
	 */
	public function __construct($parent, $name, $onlyPublish = true)
	{
		parent::__construct($parent, $name);

		$this->onlyPublish = $onlyPublish;

		$this->optionFacade = $this->presenter->context->OptionFacade;
		$this->postFacade = $this->presenter->context->PostFacade;

		$this->initItemsPerPage();
	}

	private function beforeRender()
	{
		$paginator = $this['paginator']->getPaginator();

		if(!$this->posts){
			$posts = $this->getItemsPerPagePaginator($paginator->offset);
			$paginator->itemCount = count($posts);
		}else{
			$posts = $this->getItemsPerPage($this->posts, $paginator->offset);
			$paginator->itemCount = count($this->posts);
		}

		$this->template->posts = $posts;
	}

	public function render()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostFull.latte');
		$this->template->render();
	}

	public function renderExcept()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostExcept.latte');
		$this->template->render();
	}

	public function renderTable()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostTable.latte');
		$this->template->render();
	}

	/**
	 * @param $posts
	 */
	public function setPosts($posts)
	{
		$this->posts = $posts;
	}

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		$visualPaginator = new \Flame\Addons\VisualPaginator\Paginator($this, 'paginator');
	    $visualPaginator->paginator->setItemsPerPage($this->itemsPerPage);
	    return $visualPaginator;
	}

	/**
	 * @param $offset
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	private function getItemsPerPagePaginator($offset)
	{
		if(!$this->onlyPublish){
			return $this->postFacade->getLastPostsPaginator($offset, $this->itemsPerPage);
		}else{
			return $this->postFacade->getLastPublishPostsPaginator($offset, $this->itemsPerPage);
		}
	}

	/**
	 * @param $posts
	 * @param $offset
	 * @return array
	 */
	private function getItemsPerPage(&$posts, $offset)
	{
		return array_slice($posts, $offset, $this->itemsPerPage);
	}

	private function initItemsPerPage()
	{
		$itemsPerPage = $this->optionFacade->getOptionValue('ItemsPerPage');
		if((int) $itemsPerPage >= 1) $this->itemsPerPage = (int) $itemsPerPage;
	}

}
