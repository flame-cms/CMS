<?php
/**
 * MenuFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\Models\Menu;

class MenuFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Menu\Menu';

	/**
	 * @return array
	 */
	public function getLastMenuLinks()
	{
		return $this->repository->findAll();
	}


	/**
	 * @param string $order
	 * @return array
	 */
	public function getLastMenuLinkByPriority($order = 'ASC')
	{
		return $this->repository->findBy(array(), array('priority' => $order));
	}

}
