<?php

namespace Flame\CMS\FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	protected $postFacade;

	/**
	 * @autowire
	 * @var \Flame\CMS\Components\Posts\IPostControlFactory
	 */
	protected $postControlFactory;

	/**
	 * @return \Flame\CMS\Components\Posts\PostControl
	 */
	public function createComponentPostsControl()
	{
		return $this->postControlFactory->create($this->postFacade->getLastPublishPosts());
	}

}
