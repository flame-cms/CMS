<?php
/**
 * ThemeManager.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    06.08.12
 */

namespace Flame\CMS\Utils;

class ThemeManager extends \Flame\Utils\ThemeManager
{

	/**
	 * @var array
	 */
	private $parameters;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade
	 */
	private $optionFacade;

	/**
	 * @param array $parameters
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	public function __construct(array $parameters, \Flame\CMS\Models\Options\OptionFacade $optionFacade)
	{
		$this->parameters = $parameters;
		$this->optionFacade = $optionFacade;
	}

	/**
	 * @return string
	 */
	public function getTheme()
	{
		$theme = parent::getTheme();

		if($option = $this->optionFacade->getOptionValue('Theme')){
			$path = $this->getDefaultThemeFolder() . '/' . $option;
			if($this->existTheme($path)) return $path;
		}

		return $theme;
	}
}
