<?php
/**
 * TagPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    28.07.12
 */

namespace Flame\CMS\FrontModule;

class TagPresenter extends FrontPresenter
{

	/**
	 * @var array
	 */
	private $posts;

	/**
	 * @var \Flame\CMS\Models\Tags\TagFacade
	 */
	private $tagFacade;

	/**
	 * @var \Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory
	 */
	private $postControlFactory;

	/**
	 * @param \Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory
	 */
	public function injectPostControlFactory(\Flame\CMS\Components\Posts\IPostControlFactory $postControlFactory)
	{
		$this->postControlFactory = $postControlFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Tags\TagFacade $tagFacade
	 */
	public function injectTagFacade(\Flame\CMS\Models\Tags\TagFacade $tagFacade)
	{
		$this->tagFacade = $tagFacade;
	}

	/**
	 * @param $id
	 */
	public function actionPosts($id)
	{
		if($tag = $this->tagFacade->getOne($id)){
			$this->template->tag = $tag;

			$this->posts = $tag->getPosts()->toArray();

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
	public function createComponentPostsControl()
	{
		return $this->postControlFactory->create($this->posts);
	}

}
