<?php

namespace FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{

	/**
	 * @var \Flame\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @param \Flame\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\Models\Posts\PostFacade $postFacade)
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
	 * @return \Flame\Components\Posts\Post
	 */
	public function createComponentPostsControl()
	{
		$postControl = new \Flame\Components\Posts\Post($this, 'postsControl');
		$postControl->setPosts($this->postFacade->getLastPosts());
		return $postControl;
	}
}
