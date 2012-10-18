<?php
/**
 * Form.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    18.10.12
 */

namespace Flame\CMS\Application\UI;

abstract class Form extends \Flame\Application\UI\Form
{

	public function __construct()
	{
		parent::__construct(null, null);

		$this->setRenderer(new \Kdyby\Extension\Forms\BootstrapRenderer\BootstrapRenderer);
	}

}
