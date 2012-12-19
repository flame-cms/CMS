<?php
/**
 * IImageFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    15.12.12
 */

namespace Flame\CMS\AdminModule\Forms\Images;

interface IImageFormFactory
{

	/**
	 * @param array $categories
	 * @param array $defaults
	 * @return ImageForm
	 */
	public function create(array $categories, array $defaults = array());

}
