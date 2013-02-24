<?php
/**
 * CommentForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    13.10.12
 */

namespace Flame\CMS\Components\Comments;

class CommentForm extends \Flame\CMS\AppModule\Application\UI\Form
{
	
	public function configure()
	{
		$this->addText('name', 'Your name', 55)
			->addRule(self::FILLED, 'Your name is required!')
			->addRule(self::MAX_LENGTH, 'Your name cannot be longer than %d chars', 75);

		$this->addText('email', 'Email adress', 55)
			->addRule(self::FILLED, 'Email adress is required!')
			->addRule(self::EMAIL)
			->addRule(self::MAX_LENGTH, 'Your name cannot be longer than %d chars', 100);

		$this->addText('web', 'Website', 55)
			->addRule(self::MAX_LENGTH, 'Your name cannot be longer than %d chars', 100);

		$this->addTextArea('content', 'Comment:', 65, 7)
			->addRule(self::FILLED, 'Content of comment is required.')
			->addRule(self::MAX_LENGTH, 'Comment must be shorter than %d chars.', 1000);

		$this->addSubmit('send', 'Send');
	}

}
