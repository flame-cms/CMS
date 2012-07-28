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
	private $optionFacade;

	private $posts;

	public function __construct(\Flame\Models\Categories\CategoryFacade $categoryFacade, \Flame\Models\Options\OptionFacade $optionFacade)
	{
		$this->categoryFacade = $categoryFacade;
		$this->optionFacade = $optionFacade;
	}

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

	public function createComponentPostsControl()
	{
		$postControl = new \Flame\Components\Posts\Post($this->posts);

		$itemsPerPage = $this->optionFacade->getOptionValue('items_per_page');
		if($itemsPerPage) $postControl->setCountOfItemsPerPage($itemsPerPage);

		return $postControl;
	}
}
