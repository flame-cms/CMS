<?php
/**
 * CommentFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame/CMS
 *
 * @date    13.10.12
 */

namespace Flame\CMS\Components\Comments;

class CommentFormFactory extends \Nette\Object
{

	/**
	 * @var \Flame\CMS\Models\Posts\Post $post
	 */
	private $postModel;

	/**
	 * @var \Flame\CMS\Models\Comments\CommentFacade $commentFacade
	 */
	private $commentFacade;

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
		$this->postModel = $post;
	}

	/**
	 * @return CommentForm|\Nette\Application\UI\Form
	 */
	public function createForm()
	{
		$form = new CommentForm();
		$form->configure();
		$form->onSuccess[] = $this->formSubmitted;
		return $form;
	}

	/**
	 * @param CommentForm $form
	 * @throws \Nette\InvalidArgumentException
	 */
	public function formSubmitted(CommentForm $form)
	{
		$values = $form->getValues();

		$comment = new \Flame\CMS\Models\Comments\Comment($this->postModel, $values->name, $values->email, $values->content);
		$comment->setWeb($this->treatUrl($values->web));

		$this->commentFacade->save($comment);

		$form->presenter->flashMessage('Your comment was successfully added. Please wait for moderation.');
		$form->presenter->redirect('this');
	}

	/**
	 * @param $url
	 * @return string
	 */
	protected function treatUrl($url)
	{
		if(substr($url, 0, 4) !== 'http'){
			$url = 'http://' . $url;
		}

		return $url;
	}

}
