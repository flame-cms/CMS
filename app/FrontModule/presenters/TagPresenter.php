<?php
/**
 * TagPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    28.07.12
 */

namespace FrontModule;

class TagPresenter extends FrontPresenter
{

	private $optionFacade;

	private $tagFacade;

	private $posts;

	public function __construct(\Flame\Models\Tags\TagFacade $tagFacade, \Flame\Models\Options\OptionFacade $optionFacade)
	{
		$this->tagFacade = $tagFacade;
		$this->optionFacade = $optionFacade;
	}

	public function actionPosts($id)
	{
		if($tag = $this->tagFacade->getOne($id)){
			$this->template->tag = $tag;

			$this->posts = $tag->getPosts()->toArray();

			if(!count($this->posts)){
				$this->flashMessage('No posts with tag');
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
