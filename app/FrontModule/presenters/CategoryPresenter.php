<?php
/**
 * CategoryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    16.07.12
 */

namespace FrontModule;

class CategoryPresenter extends \FrontModule\FrontPresenter
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var \Flame\Models\Categories\CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @param \Flame\Models\Categories\CategoryFacade $categoryFacade
	 */
	public function injectCategoryFacade(\Flame\Models\Categories\CategoryFacade $categoryFacade)
	{
		$this->categoryFacade = $categoryFacade;
	}

	/**
	 * @param $id
	 */
	public function actionPosts($id)
	{
		if($category = $this->categoryFacade->getOne($id)){
			$this->template->category = $category;

			$this->posts = $category->getPosts()->toArray();

			if(!count($this->posts)){
				$this->flashMessage('No posts in category.');
			}
		}else{
			$this->setView('notFound');
		}
	}

	/**
	 * @return \Flame\Components\Posts\Post
	 */
	protected function createComponentPostsControl()
	{
		$postControl = new \Flame\Components\Posts\Post($this, 'postsControl');
		$postControl->setPosts($this->posts);
		return $postControl;
	}
}
