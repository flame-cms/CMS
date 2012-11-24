<?php
/**
 * ICategoryFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    24.11.12
 */

namespace AdminModule\Forms\Categories;

interface ICategoryFormFactory
{

	/**
	 * @param array $categories
	 * @param array $defaults
	 * @return CategoryForm
	 */
	public function create(array $categories, array $defaults = array());

}
