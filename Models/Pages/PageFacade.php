<?php
/**
 * PageFacade
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    09.07.12
 */

namespace Flame\CMS\Models\Pages;

use Flame\CMS\Models\Pages;

class PageFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Pages\Page';

	/**
	 * @param $id
	 * @return mixed
	 */
	public function getOne($id)
    {
	    return $this->repository->findOneById($id);
    }

	/**
	 * @param null $limit
	 * @return mixed
	 */
	public function getLastPages($limit = null)
    {
        return $this->repository->findLast($limit);
    }
}
