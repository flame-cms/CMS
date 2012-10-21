<?php

namespace Flame\CMS\Components\Newsreel;

class NewsreelControl extends \Flame\Application\UI\Control
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
		$this->template->setFile(__DIR__ . '/NewsreelControl.latte');
		$this->template->newsreels = $this->items;
		$this->template->render();
	}


}
