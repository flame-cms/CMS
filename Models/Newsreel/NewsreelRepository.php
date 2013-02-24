<?php
/**
 * NewsreelRepository
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    10.07.12
 */

namespace Flame\CMS\Models\Newsreel;

class NewsreelRepository extends \Flame\Doctrine\Model\Repository
{
	/**
	 * @param $limit
	 * @return array
	 */
	public function findAllPassed($limit)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->add('select', 'n')
			->add('from', '\Flame\CMS\Models\Newsreel\Newsreel n')
			->add('where', 'n.date <= :date')
			->add('orderBy', 'n.date DESC')
			->setParameter('date', new \DateTime);

		if($limit) $qb->setMaxResults((int) $limit);

		return $qb->getQuery()->getResult();
	}
}
