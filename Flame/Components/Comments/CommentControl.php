<?php

namespace Flame\CMS\Components\Comments;

/**
* Comments component
*/
class CommentControl extends \Flame\Application\UI\Control
{

	/**
	 * @var CommentFormFactory
	 */
	private $commentFormFactory;

	/**
	 * @var array|null
	 */
	private $comments;

	/**
	 * @param $comments
	 */
	public function setComments($comments)
	{
		$this->comments = $comments;
	}

	/**
	 * @param CommentFormFactory $factory
	 */
	public function setCommentFormFactory(CommentFormFactory $factory)
	{
		$this->commentFormFactory = $factory;
	}

	public function render()
	{
		$this->template->setFile(__DIR__.'/CommentControl.latte');
		$this->template->comments = $this->comments;
		$this->template->render();
	}

	/**
	 * @return CommentForm|\Nette\Application\UI\Form
	 */
	protected function createComponentCommentForm()
	{
		return $this->commentFormFactory->createForm();
	}


}
