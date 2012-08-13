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

class PageFacade extends \Nette\Object
{
    private $repository;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Pages\Page');
    }

    public function getOne($id)
    {
	    return $this->repository->findOneById($id);
    }

    public function getLastPages($limit = null)
    {
        return $this->repository->findLast($limit);
    }

    public function save(Page $page)
    {
        return $this->repository->save($page);
    }

    public function delete(Page $page)
    {
        return $this->repository->delete($page);
    }
}
