<?php

namespace Flame\CMS\FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{

	/**
	 * @var \Flame\CMS\Components\Posts\PostControlFactory $postControlFactory
	 */
	private $postControlFactory;

	/**
	 * @param \Flame\CMS\Components\Posts\PostControlFactory $postControlFactory
	 */
	public function injectPostControlFactory(\Flame\CMS\Components\Posts\PostControlFactory $postControlFactory)
	{
		$this->postControlFactory = $postControlFactory;
	}

	/**
	 * @return \Flame\CMS\Components\Posts\PostControl
	 */
	public function createComponentPostsControl()
	{
		return $this->postControlFactory->create();
	}
}
