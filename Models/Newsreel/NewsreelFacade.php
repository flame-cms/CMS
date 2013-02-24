<?php

namespace Flame\CMS\Models\Newsreel;

class NewsreelFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Newsreel\Newsreel';

	/**
	 * @param $id
	 * @return mixed
	 */
	public function getOne($id)
	{
		return $this->repository->findOneById($id);
	}

	/**
	 * @return array
	 */
	public function getLastNewsreel()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

	/**
	 * @param null $limit
	 * @return mixed
	 */
	public function getLastPassedNewsreel($limit = null)
    {
        return $this->repository->findAllPassed($limit);
    }

	/**
	 * @param Newsreel $newsreel
	 * @return mixed
	 */
	public function increaseHit(Newsreel $newsreel)
	{
		$newsreel->setHit($newsreel->getHit() + 1);
		return $this->save($newsreel);
	}
}
