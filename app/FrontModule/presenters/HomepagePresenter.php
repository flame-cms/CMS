<?php

namespace FrontModule;

/**
* Home page
*/
class HomepagePresenter extends FrontPresenter
{
	private $postFacade;

    public function __construct(\Flame\Models\Posts\PostFacade $postFacade)
    {
        $this->postFacade = $postFacade;
    }
	
	public function actionDefault()
	{
		if(!count($this->postFacade->getLastPublishPosts())){
			$this->flashMessage('No posts');
		}	

	}

	public function createComponentPostsControl()
	{
		return new \Flame\Components\PostsControl($this->postFacade->getLastPublishPosts());
	}
}

?>