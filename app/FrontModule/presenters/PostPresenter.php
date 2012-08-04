<?php

namespace FrontModule;

/**
* Post presenter
*/
class PostPresenter extends FrontPresenter
{
	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	private $postFacade;

	/**
	 * @var \Flame\CMS\Models\Posts\Post
	 */
    private $post;

    /**
     * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
     */
    public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
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
		$control =  new \Flame\CMS\Components\Comments\Comment($this, 'commentsControl');
		$control->setPost($this->post);
		return $control;
	}
}
