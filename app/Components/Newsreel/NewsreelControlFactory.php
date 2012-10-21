<?php
/**
 * NewsreelControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    21.10.12
 */

namespace Flame\CMS\Components\Newsreel;

class NewsreelControlFactory extends \Flame\Application\ControlFactory
{

	/**
	 * @var int
	 */
	private $itemsInNewsreelMenuList = 3;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	private $optionFacade;

	/**
	 * @var \Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade
	 */
	private $newsreelFacade;

	/**
	 * @param \Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade
	 */
	public function injectNewsreelFacade(\Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade)
	{
		$this->newsreelFacade = $newsreelFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
	{
		$this->optionFacade = $optionFacade;
	}

	/**
	 * @param null $data
	 * @return NewsreelControl
	 */
	public function create($data = null)
	{
		$this->initCountOfItems();
		$control = new NewsreelControl();
		$control->setItems($this->newsreelFacade->getLastPassedNewsreel($this->itemsInNewsreelMenuList));
		return $control;
	}

	private function initCountOfItems()
	{
		$countOfItems = $this->optionFacade->getOptionValue('Menu:NewsreelCount');
		if((int) $countOfItems > 0) $this->itemsInNewsreelMenuList = (int) $countOfItems;
	}

}
