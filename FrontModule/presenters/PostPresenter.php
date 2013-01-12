<?php

namespace Flame\CMS\FrontModule;

/**
* Post presenter
*/
class PostPresenter extends FrontPresenter
{


	/**
	 * @var \Flame\CMS\Models\Posts\Post
	 */
	private $post;

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
	protected $postFacade;

	/**
	 * @autowire
	 * @var \Flame\CMS\Components\Comments\CommentControlFactory
	 */
	protected $commentControlFactory;

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
