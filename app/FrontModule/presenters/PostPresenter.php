<?php

namespace FrontModule;

/**
* Post presenter
*/
class PostPresenter extends FrontPresenter
{
	/**
	 * @var \Flame\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @var \Flame\Models\Posts\Post
	 */
    private $post;

    /**
     * @param \Flame\Models\Posts\PostFacade $postFacade
     */
    public function injectPostFacade(\Flame\Models\Posts\PostFacade $postFacade)
    {
    	$this->postFacade = $postFacade;
    }

	public function actionDefault($id)
	{

		$this->post = $this->postFacade->getOne($id);

		if(!$this->post){
			$this->setView('notFound');
		}else{
            $this->postFacade->increaseHit($this->post);

			$this->template->post = $this->post;
			$this->template->tags = $this->post->getTags()->toArray();

			if(!$category = $this->post->getCategory()) $category = 'none';
			$this->template->category = $category;
		}
	}

	protected function createComponentCommentsControl()
	{
		$control =  new \Flame\Components\Comments\Comment($this, 'commentsControl');
		$control->setPost($this->post);
		return $control;
	}
}
