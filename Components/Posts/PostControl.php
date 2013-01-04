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
	 * @var \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	private $optionFacade;

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
	{
		$this->optionFacade = $optionFacade;
	}

	/**
	 * @param array $posts
	 */
	public function __construct($posts)
	{
		parent::__construct();

		$this->posts = $posts;
	}

	public function render()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostControlFull.latte')->render();
	}

	public function renderExcept()
	{
		$this->beforeRender();
		$this->template->setFile(__DIR__ . '/PostControlExcept.latte')->render();
	}

	protected function beforeRender()
	{
		$postsLimit = (int) $this->optionFacade->getOptionValue('ItemsPerPage');
		if($postsLimit > 0) $this->itemsPerPage = $postsLimit;

		$posts = $this->posts;
		$paginator = $this['paginator']->getPaginator();
		$paginator->itemsPerPage = $this->itemsPerPage;
		$paginator->itemCount = count($posts);

		if(is_array($posts) and count($posts))
			$posts = $this->getItemsPerPage($posts, $paginator->offset);

		$this->template->posts = $posts;
	}

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		return new \Flame\Addons\VisualPaginator\Paginator;
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
