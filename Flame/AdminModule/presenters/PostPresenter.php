<?php

namespace Flame\CMS\AdminModule;

/**
* PostPresenter
*/
class PostPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Posts\Post
	 */
    private $post;

	/**
	 * @var \Flame\Components\FileUploader\FileUploaderControlFactory $fileUploaderControlFactory
	 */
	private $fileUploaderControlFactory;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	private $postFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Posts\PostFormFactory $postFormFactory
	 */
	private $postFormFactory;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Posts\PostFormFactory $postFormFactory
	 */
	public function injectPostFormFactory(\Flame\CMS\AdminModule\Forms\Posts\PostFormFactory $postFormFactory)
	{
		$this->postFormFactory = $postFormFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
	{
		$this->postFacade = $postFacade;
	}

	public function renderDefault()
	{
		$paginator = $this['paginator']->getPaginator();
		$posts = $this->postFacade->getLastPostsPaginator($paginator->offset, 25);
		$paginator->itemCount = count($posts);
		$this->template->posts = $posts;
	}

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		$visualPaginator = new \Flame\Addons\VisualPaginator\Paginator;
		$visualPaginator->paginator->setItemsPerPage(25);
		return $visualPaginator;
	}

	/**
	 * @param $id
	 */
	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Post', 'delete')){
			$this->flashMessage('Access denied');
		}else{

			$post = $this->postFacade->getOne($id);

			if($post){
				$this->postFacade->delete($post);
			}else{
				$this->flashMessage('Required post to delete does not exist!');
			}
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('posts');
		}
	}

	/**
	 * @param $id
	 */
	public function handleMarkPublish($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Post', 'publish')){
			$this->flashMessage('Access denied');
		}else{

			$post = $this->postFacade->getOne($id);

			if($post and (int)$post->getPublish() == 1){
				$post->setPublish(false);
                $this->postFacade->save($post);
			}else{
                $post->setPublish(true);
                $this->postFacade->save($post);
			}
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('posts');
		}
	}

	/**
	 * @param $id
	 */
	public function actionEdit($id)
	{
        if(!$this->post = $this->postFacade->getOne($id)){
	        $this->flashMessage('Post does not exist.');
            $this->redirect('default');
        }

	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentPostForm()
	{

		$form = $this->postFormFactory->configure($this->post)->createForm();

		if($this->post){
			$form->onSuccess[] = $this->lazyLink('this');
		}else{
			$form->onSuccess[] = $this->lazyLink('default');
		}
        return $form;
	}

}
