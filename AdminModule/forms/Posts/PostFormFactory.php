<?php
/**
 * PostControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    13.11.12
 */

namespace Flame\CMS\AdminModule\Forms\Posts;

use Flame\Utils\Strings;

class PostFormFactory extends \Flame\Application\FormFactory
{

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
	 * @var \Nette\Security\User $user
	 */
	private $user;

	/**
	 * @param \Nette\Security\User $user
	 */
	public function injectUser(\Nette\Security\User $user)
	{
		$this->user = $user;
	}

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

	public function configure($post)
	{
		$this->post = $post;
		$this->form = new PostForm();
		$this->form->setTags($this->tagFacade->getLastTags());
		$this->form->setCategories($this->categoryFacade->getLastCategories());

		if($this->post){
			$this->form->configureEdit($this->post->toArray());
		}else{
			$this->form->configureAdd();
		}

		$this->form->onSuccess[] = $this->formSubmitted;
		return $this;

	}

	/**
	 * @param PostForm $f
	 * @throws \Nette\Application\BadRequestException
	 */
	public function formSubmitted(PostForm $f)
	{
		$values = $f->getValues();

		if(empty($values['slug'])){
			$slug = Strings::createSlug($values['name']);
		}else{
			$slug = Strings::createSlug($values['slug']);
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
			if($this->post){
				$this->post
					->setName($values['name'])
					->setSlug($values['slug'])
					->setDescription($values['description'])
					->setKeywords($values['keywords'])
					->setContent($values['content'])
					->setCategory($category)
					->setPublish($values['publish'])
					->setComment($values['comment'])
					->setTags($tags);

				$this->postFacade->save($this->post);
				$f->presenter->flashMessage('Post was edited');

			}else{
				$post = new \Flame\CMS\Models\Posts\Post(
					$this->userFacade->getOne($this->user->getId()),
					$values['name'],
					$slug,
					$values['content'],
					$category
				);

				$post->setComment($values['comment'])
					->setPublish($values['publish'])
					->setKeywords($values['keywords'])
					->setDescription($values['description'])
					->setTags($tags);

				$this->postFacade->save($post);
				$f->presenter->flashMessage('Post was successfully added.', 'success');

			}
		}

	}

	/**
	 * @param $name
	 * @return \Flame\CMS\Models\Categories\Category|object
	 */
	protected function createNewCategory($name)
	{
		if($categoryExist = $this->categoryFacade->getOneByName($name)) return $categoryExist;

		$category = new \Flame\CMS\Models\Categories\Category($name, Strings::createSlug($name));
		$this->categoryFacade->save($category);
		return $category;
	}

	/**
	 * @param $name
	 * @return \Flame\CMS\Models\Tags\Tag|object
	 */
	protected function createNewTag($name)
	{
		if($tagExist = $this->tagFacade->getOneByName($name)) return $tagExist;

		$tag = new \Flame\CMS\Models\Tags\Tag($name, Strings::createSlug($name));
		$this->tagFacade->save($tag);
		return $tag;
	}

}
