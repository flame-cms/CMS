<?php
/**
 * CategoriesControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    16.07.12
 */

namespace Flame\CMS\Components\Categories;

class CategoryControl extends \Flame\Application\UI\Control
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
		$this->template->setFile(__DIR__ . '/CategoryControl.latte');
		$this->template->categories = $this->items;
		$this->template->render();
	}

}
