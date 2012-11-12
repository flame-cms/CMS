<?php

namespace Flame\CMS\Components\Posts;

class PostControl extends \Flame\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var int
	 */
	private $itemsPerPage = 10;

	/**
	 * @param array $posts
	 */
	public function __construct($posts)
	{
		parent::__construct();

		$this->posts = $posts;
	}

	/**
	 * For additional adding of posts
	 *
	 * @param array $posts
	 */
	public function setPosts($posts)
	{
		$this->posts = $posts;
	}

	/**
	 * @param $itemsPerPage
	 */
	public function setPageLimit($itemsPerPage)
	{
		if((int) $itemsPerPage >= 1) $this->itemsPerPage = (int) $itemsPerPage;
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

	protected function beforeRender()
	{
		$paginator = $this['paginator']->getPaginator();

		$posts = $this->posts;
		if(is_array($this->posts) and count($this->posts))
			$posts = $this->getItemsPerPage($this->posts, $paginator->offset);

		$paginator->itemCount = count($this->posts);
		$this->template->posts = $posts;
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
	 * @param $posts
	 * @param $offset
	 * @return array
	 */
	protected function getItemsPerPage(array &$posts, $offset)
	{
		return array_slice($posts, $offset, $this->itemsPerPage);
	}

}
