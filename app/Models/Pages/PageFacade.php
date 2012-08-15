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

class PageFacade extends \Nette\Object implements \Flame\Model\IFacade
{
	/**
	 * @var \Doctrine\ORM\EntityRepository
	 */
	private $repository;

	/**
	 * @param \Doctrine\ORM\EntityManager $entityManager
	 */
	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Pages\Page');
    }

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

	/**
	 * @param Page $page
	 * @return mixed
	 */
	public function save(Page $page)
    {
        return $this->repository->save($page);
    }

	/**
	 * @param Page $page
	 * @return mixed
	 */
	public function delete(Page $page)
    {
        return $this->repository->delete($page);
    }
}
