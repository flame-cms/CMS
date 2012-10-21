<?php
/**
 * TagControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    28.07.12
 */

namespace Flame\CMS\Components\Tags;

class TagControl extends \Flame\Application\UI\Control
{

	/**
	 * @var mixed
	 */
	private $items;

	/**
	 * @param $items
	 */
	public function setItems($items)
	{
		$this->items = $items;
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/TagControl.latte');
		$this->template->tags = $this->items;
		$this->template->render();
	}


}
