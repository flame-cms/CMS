<?php

namespace FrontModule;

/**
* Post presenter
*/
class PostPresenter extends FrontPresenter
{
    private $commentFacade;
	private $postFacade;
    private $post;

    public function __construct(\Flame\Models\Posts\PostFacade $postFacade, \Flame\Models\Comments\CommentFacade $commentFacade)
    {
        $this->postFacade = $postFacade;
        $this->commentFacade = $commentFacade;
    }

	public function actionDefault($id)
	{

		$this->post = $this->postFacade->getOne($id);

		if(!$this->post){
			$this->setView('notFound');
		}else{
            $this->postFacade->increaseHit($this->post);

			$this->template->post = $this->post;

			if(count($tags = $this->post->tags->toArray())){
				$tags = implode(',', $tags);
			}else{
				$tags = 'none';
			}
			$this->template->tags = $tags;

			if(!$category = $this->post->category) $category = 'none';
			$this->template->category = $category;
		}
	}

	protected function createComponentComments()
	{
		return new \Flame\Components\CommentsControl($this->post, $this->commentFacade);
	}
}
?>