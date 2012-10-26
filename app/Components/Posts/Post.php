<?php

namespace Flame\CMS\Components\Posts;

class PostControl extends \Flame\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @var int
	 */
	private $itemsPerPage = 10;


	public function __construct(\Flame\CMS\Models\Posts\PostFacade $postFacade, $posts = null)
	{
		parent::__construct();

		$this->postFacade = $postFacade;
		$this->posts = $posts;
	}

	/**
	 * @param $itemsPerPage
	 */
	public function setPageLimit($itemsPerPage)
	{
		if((int) $itemsPerPage >= 1) $this->itemsPerPage = (int) $itemsPerPage;
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
		$this->template->setFile(__DIR__ . '/PostControlFull.latte');
		$this->template->render();
	}

	public function renderExcept()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostControlExcept.latte');
		$this->template->render();
	}

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		$visualPaginator = new \Flame\Addons\VisualPaginator\Paginator;
	    $visualPaginator->paginator->setItemsPerPage($this->itemsPerPage);
	    return $visualPaginator;
	}

	/**
	 * @param $offset
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	private function getItemsPerPagePaginator($offset)
	{
		return $this->postFacade->getLastPublishPostsPaginator($offset, $this->itemsPerPage);
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

}
