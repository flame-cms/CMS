<?php

namespace Flame\CMS\Components\Posts;

/**
* Comments component
*/
class Post extends \Flame\Application\UI\Control
{

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
	 */
	public function __construct($parent, $name)
	{
		parent::__construct($parent, $name);

		$this->optionFacade = $this->presenter->context->OptionFacade;
		$this->postFacade = $this->presenter->context->PostFacade;
	}

	private function initItemsPerPage()
	{
		$itemsPerPage = $this->optionFacade->getOptionValue('items_per_page');
		if((int) $itemsPerPage >= 1) $this->itemsPerPage = (int) $itemsPerPage;
	}


	private function beforeRender()
	{
		$this->initItemsPerPage();

		$paginator = $this['paginator']->getPaginator();
		$posts = $this->getItemsPerPage($paginator->offset);
		$paginator->itemCount = count($posts);
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

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		$visualPaginator = new \Flame\Addons\VisualPaginator\Paginator($this, 'paginator');
	    $visualPaginator->paginator->itemsPerPage = $this->itemsPerPage;
	    return $visualPaginator;
	}

	/**
	 * @param $offset
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	private function getItemsPerPage($offset)
	{
		return $this->postFacade->getLastPublishPostsPaginator($offset, $this->itemsPerPage);
	}

}
