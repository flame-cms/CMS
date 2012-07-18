<?php

namespace AdminModule;

use Nette\Application\UI\Form;

/**
* PostPresenter
*/
class PostPresenter extends AdminPresenter
{
	private $id;
    private $post;

    private $postFacade;
    private $userFacade;
	private $categoryFacade;
	private $tagFacade;

    public function __construct(
	    \Flame\Models\Posts\PostFacade $postFacade,
	    \Flame\Models\Users\UserFacade $userFacade,
		\Flame\Models\Categories\CategoryFacade $categoryFacade,
		\Flame\Models\Tags\TagFacade $tagFacade
    )
    {
        $this->postFacade = $postFacade;
        $this->userFacade = $userFacade;
	    $this->categoryFacade = $categoryFacade;
	    $this->tagFacade = $tagFacade;
    }
	
	public function renderDefault()
	{
		$this->template->posts = $this->postFacade->getLastPosts();
	}

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

	public function actionEdit($id)
	{
		$this->id = $id;

        if(!$this->post = $this->postFacade->getOne($id)){
	        $this->flashMessage('Post does not exist.');
            $this->redirect('Post:');
        }

	}

	protected function createComponentPostForm()
	{

		$f = new \Flame\Forms\PostForm(
			$this->categoryFacade->getLastCategories(),
			$this->tagFacade->getLastTags()
		);

		if($this->id){
			$f->configureEdit($this->post->toArray());
		}else{
			$f->configureAdd();
		}

		$f->onSuccess[] = callback($this, 'postFormSubmitted');

        return $f;
	}

	public function postFormSubmitted(Form $f)
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
		if(isset($values['tags']) and is_array($values['tags']) and count($values['tags'])){
			foreach($values['tags'] as $tag){
				$tags[] = $this->tagFacade->getOne($tag);
			}
		}

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
	                ->setTags($tags)
	                ->setPublish($values['publish'])
	                ->setComment($values['comment']);

	            $this->postFacade->persist($this->post);
		        $this->flashMessage('Post was edited');
		        $this->redirect('this');

	        }else{
	            $post = new \Flame\Models\Posts\Post(
	                $this->userFacade->getOne($this->getUser()->getId()),
	                $values['name'],
	                $slug,
	                $values['content'],
		            $category
	            );

		        $post->setComment($values['comment'])
			        ->setMarkdown($values['markdown'])
			        ->setPublish($values['publish'])
			        ->setTags($tags)
			        ->setKeywords($values['keywords'])
			        ->setDescription($values['description']);

	            $this->postFacade->persist($post);
		        $this->flashMessage('Post was successfully added.', 'success');
		        $this->redirect('Post:');

	        }
		}

	}

	private function createNewCategory($name)
	{
		if($categoryExist = $this->categoryFacade->getOneByName($name)) return $categoryExist;

		$category = new \Flame\Models\Categories\Category($name, "", $this->createSlug($name));
		$this->categoryFacade->persist($category);
		return $category;
	}

	private function createNewTag($name)
	{
		if($tagExist = $this->tagFacade->getOneByName($name)) return $tagExist;

		$tag = new \Flame\Models\Tags\Tag($name, $this->createSlug($name));
		$this->tagFacade->persist($tag);
		return $tag;
	}

}
?>