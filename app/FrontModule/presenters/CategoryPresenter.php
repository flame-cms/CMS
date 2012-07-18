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
	private $categoryFacade;
	private $postFacade;

	private $posts;

	public function __construct(
		\Flame\Models\Categories\CategoryFacade $categoryFacade,
		\Flame\Models\Posts\PostFacade $postFacade
	)
	{
		$this->categoryFacade = $categoryFacade;
		$this->postFacade = $postFacade;
	}

	public function actionPosts($id)
	{
		$category = $this->categoryFacade->getOne($id);

		if($category){
			$this->template->category = $category;

			$this->posts = $this->postFacade->getLastPublishPosts($category->id);

			if(!count($this->posts)){
				$this->flashMessage('No posts in category.');
			}
		}else{
			$this->setView('notFound');
		}
	}

	public function createComponentPostsControl()
	{
		return new \Flame\Components\PostsControl($this->posts);
	}
}