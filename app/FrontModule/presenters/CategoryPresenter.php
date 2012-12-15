<?php
/**
 * CategoryPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    16.07.12
 */

namespace Flame\CMS\FrontModule;

class CategoryPresenter extends \Flame\CMS\FrontModule\FrontPresenter
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var \Flame\CMS\Models\Categories\CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @var \Flame\CMS\Components\Posts\PostControlFactory $postControlFactory
	 */
	private $postControlFactory;

	/**
	 * @param \Flame\CMS\Components\Posts\PostControlFactory $postControlFactory
	 */
	public function injectPostControlFactory(\Flame\CMS\Components\Posts\PostControlFactory $postControlFactory)
	{
		$this->postControlFactory = $postControlFactory;
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
	public function actionPosts($id)
	{
		if($category = $this->categoryFacade->getOne($id)){
			$this->template->category = $category;

			$this->posts = $category->getPosts()->toArray();

			if(!count($this->posts)){
				$this->setView('none');
			}
		}else{
			$this->setView('notFound');
		}
	}

	/**
	 * @return \Flame\CMS\Components\Posts\PostControl
	 */
	protected function createComponentPostsControl()
	{
		return $this->postControlFactory->create($this->posts);
	}
}
