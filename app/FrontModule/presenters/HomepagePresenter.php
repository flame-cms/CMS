<?php

namespace FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
	{
		$this->postFacade = $postFacade;
	}

	public function actionDefault()
	{

		if(!count($this->postFacade->getLastPublishPosts())){
			$this->flashMessage('No posts');
		}

	}

	/**
	 * @return \Flame\CMS\Components\Posts\Post
	 */
	public function createComponentPostsControl()
	{
		$postControl = new \Flame\CMS\Components\Posts\Post($this, 'postsControl');
		$postControl->setPosts($this->postFacade->getLastPosts());
		return $postControl;
	}
}
