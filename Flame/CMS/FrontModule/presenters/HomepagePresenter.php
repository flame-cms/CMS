<?php

namespace Flame\CMS\FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{

	/**
	 * @var \Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory
	 */
	private $postControlFactory;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	private $postFacade;

	/**
	 * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
	{
		$this->postFacade = $postFacade;
	}

	/**
	 * @param \Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory
	 */
	public function injectPostControlFactory(\Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory)
	{
		$this->postControlFactory = $postControlFactory;
	}

	/**
	 * @return \Flame\CMS\Components\Posts\PostControl
	 */
	public function createComponentPostsControl()
	{
		return $this->postControlFactory->create($this->postFacade->getLastPublishPosts());
	}

}
