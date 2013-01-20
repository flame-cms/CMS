<?php
/**
 * CommentControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    13.10.12
 */

namespace Flame\CMS\Components\Comments;

class CommentControlFactory extends \Nette\Object
{

	/**
	 * @var \Flame\CMS\Models\Posts\Post $post
	 */
	private $post;

	/**
	 * @var \Flame\CMS\Models\Comments\CommentFacade $commentFacade
	 */
	private $commentFacade;

	/**
	 * @var CommentFormFactory $commentFormFactory
	 */
	private $commentFormFactory;

	/**
	 * @param CommentFormFactory $commentFormFactory
	 */
	public function injectCommentFormFactory(CommentFormFactory $commentFormFactory)
	{
		$this->commentFormFactory = $commentFormFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Comments\CommentFacade $commentFacade
	 */
	public function injectCommentFacade(\Flame\CMS\Models\Comments\CommentFacade $commentFacade)
	{
		$this->commentFacade = $commentFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Posts\Post $post
	 */
	public function setPostModel(\Flame\CMS\Models\Posts\Post $post)
	{
		$this->post = $post;
	}

	public function create($data = null)
	{

		if($this->post === null){
			throw new \Nette\InvalidArgumentException('You must set the Post model. Call method' . __CLASS__ . '::setPostModel');
		}

		$this->commentFormFactory->setPostModel($this->post);

		$control = new CommentControl();
		$control->setComments($this->commentFacade->getPublishCommentsInPost($this->post->getId()));
		$control->setCommentFormFactory($this->commentFormFactory);
		return $control;

	}

}
