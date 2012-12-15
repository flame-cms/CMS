<?php

namespace Flame\CMS\AdminModule;

class CommentPresenter extends AdminPresenter
{
	/**
	 * @var \Flame\CMS\Models\Comments\CommentFacade
	 */
	private $commentFacade;

	/**
	 * @param \Flame\CMS\Models\Comments\CommentFacade $commentFacade
	 */
    public function injectCommentFacade(\Flame\CMS\Models\Comments\CommentFacade $commentFacade)
    {
        $this->commentFacade = $commentFacade;
    }

	public function renderDefault()
	{
        $this->template->comments = $this->commentFacade->getLastComments();
	}

	/**
	 * @param $id
	 */
    public function handleDelete($id)
    {
        if(!$this->getUser()->isAllowed('Admin:Comment', 'delete')){
            $this->flashMessage('Access denied');
        }else{

            $comment = $this->commentFacade->getOne($id);

            if($comment){
                $this->commentFacade->delete($comment);
            }
        }

        if(!$this->isAjax()){
            $this->redirect('this');
        }else{
            $this->invalidateControl('comments');
        }
    }

	/**
	 * @param $id
	 */
    public function handleMarkPublish($id)
    {
        if(!$this->getUser()->isAllowed('Admin:Comment', 'publish')){
            $this->flashMessage('Access denied');
        }else{

            $comment = $this->commentFacade->getOne($id);

            if($comment){
                if($comment->getPublish() == 1){
                    $comment->setPublish(0);
                }else{
                    $comment->setPublish(1);
                }
                $this->commentFacade->save($comment);
            }
        }

        if(!$this->isAjax()){
            $this->redirect('this');
        }else{
            $this->invalidateControl('comments');
        }
    }
}
