<?php

namespace Flame\CMS\Models\Newsreel;

class NewsreelFacade extends \Nette\Object implements \Flame\Model\IFacade
{
	private $repository;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\Newsreel\Newsreel');
	}

	public function getOne($id)
	{
		return $this->repository->findOneById($id);
	}

	public function getLastNewsreel()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

    public function getLastPassedNewsreel($limit = null)
    {
        return $this->repository->findAllPassed($limit);
    }

    public function save(Newsreel $newsreel)
    {
        return $this->repository->save($newsreel);
    }

    public function delete(Newsreel $newsreel)
    {
        return $this->repository->delete($newsreel);
    }

	public function increaseHit(Newsreel $newsreel)
	{
		$newsreel->setHit($newsreel->getHit() + 1);
		return $this->save($newsreel);
	}
}
