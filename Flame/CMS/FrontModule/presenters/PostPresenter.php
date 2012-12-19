<?php

namespace Flame\CMS\FrontModule\Presenters;

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
	 * @var \Flame\CMS\Components\Comments\CommentControlFactory $commentControlFactory
	 */
	private $commentControlFactory;

	/**
	 * @param \Flame\CMS\Components\Comments\CommentControlFactory $commentControlFactory
	 */
	public function injectCommentControlFactory(\Flame\CMS\Components\Comments\CommentControlFactory $commentControlFactory)
	{
		$this->commentControlFactory = $commentControlFactory;
	}

    /**
     * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
     */
    public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
    {
    	$this->postFacade = $postFacade;
    }

	/**
	 * @param $id
	 */
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

	/**
	 * @return \Flame\CMS\Components\Comments\CommentControl
	 */
	protected function createComponentCommentsControl()
	{
		$this->commentControlFactory->setPostModel($this->post);

		return $this->commentControlFactory->create();
	}
}
