<?php

namespace AdminModule;

use Flame\CMS\Forms\Posts\PostForm;

/**
* PostPresenter
*/
class PostPresenter extends AdminPresenter
{
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var \Flame\CMS\Models\Posts\Post
	 */
    private $post;

	/**
	 * @var \Flame\CMS\Models\Tags\TagFacade
	 */
	private $tagFacade;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade
	 */
    private $postFacade;

	/**
	 * @var \Flame\CMS\Models\Users\UserFacade
	 */
    private $userFacade;

	/**
	 * @var \Flame\CMS\Models\Categories\CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @param \Flame\CMS\Models\Tags\TagFacade $tagFacade
	 */
    public function injectTagFacade(\Flame\CMS\Models\Tags\TagFacade $tagFacade)
    {
    	$this->tagFacade = $tagFacade;
    }

	/**
	 * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
	{
		$this->postFacade = $postFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Users\UserFacade $userFacade
	 */
	public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
	{
		$this->userFacade = $userFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Categories\CategoryFacade $categoryFacade
	 */
	public function injectCategoryFacade(\Flame\CMS\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
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
                $this->postFacade->persist($post);
			}else{
                $post->setPublish(true);
                $this->postFacade->persist($post);
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
		$this->id = $id;

        if(!$this->post = $this->postFacade->getOne($id)){
	        $this->flashMessage('Post does not exist.');
            $this->redirect('Post:');
        }

	}

	/**
	 * @return \Flame\CMS\Components\Posts\Post
	 */
	protected function createComponentPostControl()
	{
		return new \Flame\CMS\Components\Posts\Post($this, 'postControl', false);
	}

	/**
	 * @return \Flame\CMS\Forms\Posts\PostForm
	 */
	protected function createComponentPostForm()
	{

		$f = new PostForm($this, 'postForm');

		$f->setTags($this->tagFacade->getLastTags());
		$f->setCategories($this->categoryFacade->getLastCategories());

		if($this->id){
			$f->configureEdit($this->post->toArray());
		}else{
			$f->configureAdd();
		}

		$f->onSuccess[] = $this->postFormSubmitted;

        return $f;
	}

	/**
	 * @param \Flame\CMS\Forms\Posts\PostForm $f
	 * @throws \Nette\Application\BadRequestException
	 */
	public function postFormSubmitted(PostForm $f)
	{
        if($this->id and !$this->post){
            throw new \Nette\Application\BadRequestException;
        }

        $values = $f->getValues();

        if(empty($values['slug'])){
            $slug = $this->createSlug($values['name']);
        }else{
            $slug = $this->createSlug($values['slug']);
        }

		$tags = array();
		if(isset($values['tagsNew']) and !empty($values['tagsNew'])){

			$tagsRaw = explode(',', $values['tagsNew']);

			if(count($tagsRaw)){
				foreach($tagsRaw as $tag){
					if(!empty($tag)) $tags[] = $this->createNewTag(trim($tag));
				}
			}else{
				if(!empty($values['tagsNew'])) $tags[] = $this->createNewTag(trim($values['tagsNew']));
			}

		}

		if(isset($values['categoryNew']) and isset($values['category']) and !empty($values['categoryNew'])){
			$category = $this->createNewCategory($values['categoryNew']);

		}elseif(isset($values['categoryNew']) and !empty($values['categoryNew'])){
			$category = $this->createNewCategory($values['categoryNew']);

		}elseif(isset($values['category'])){
			$category = $this->categoryFacade->getOne($values['category']);

		}else{
			$f->addError('Category is required. Please select one or create new.');

		}

		if(!$f->hasErrors()){
	        if($this->id){
	            $this->post
	                ->setName($values['name'])
	                ->setSlug($values['slug'])
	                ->setDescription($values['description'])
	                ->setKeywords($values['keywords'])
	                ->setContent($values['content'])
	                ->setCategory($category)
	                ->setPublish($values['publish'])
	                ->setComment($values['comment']);

		        if(count($tags)){
			        foreach($tags as $tag){
				        $this->post->setTags($tag);
			        }
		        }

	            $this->postFacade->persist($this->post);
		        $this->flashMessage('Post was edited');
		        $this->redirect('this');

	        }else{
	            $post = new \Flame\CMS\Models\Posts\Post(
	                $this->userFacade->getOne($this->getUser()->getId()),
	                $values['name'],
	                $slug,
	                $values['content'],
		            $category
	            );

		        $post->setComment($values['comment'])
			        ->setMarkdown($values['markdown'])
			        ->setPublish($values['publish'])
			        ->setKeywords($values['keywords'])
			        ->setDescription($values['description']);

		        if(count($tags)){
			        foreach($tags as $tag){
				        $post->setTags($tag);
			        }
		        }

	            $this->postFacade->persist($post);
		        $this->flashMessage('Post was successfully added.', 'success');
		        $this->redirect('Post:');

	        }
		}

	}

	/**
	 * @param $name
	 * @return \Flame\CMS\Models\Categories\Category|object
	 */
	private function createNewCategory($name)
	{
		if($categoryExist = $this->categoryFacade->getOneByName($name)) return $categoryExist;

		$category = new \Flame\CMS\Models\Categories\Category($name, "", $this->createSlug($name));
		$this->categoryFacade->persist($category);
		return $category;
	}

	/**
	 * @param $name
	 * @return \Flame\CMS\Models\Tags\Tag|object
	 */
	private function createNewTag($name)
	{
		if($tagExist = $this->tagFacade->getOneByName($name)) return $tagExist;

		$tag = new \Flame\CMS\Models\Tags\Tag($name, $this->createSlug($name));
		$this->tagFacade->persist($tag);
		return $tag;
	}

}
