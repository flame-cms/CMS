<?php
/**
 * PageRepository
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    11.07.12
 */

namespace Flame\CMS\Models\Pages;

class PageRepository extends \Flame\Doctrine\Model\Repository
{
	/**
	 * @param $limit
	 * @return array
	 */
	public function findLast($limit)
	{
		$qb = $this->_em->createQueryBuilder();
		$q = $qb->select('p')
			->from('\Flame\CMS\Models\Pages\Page', 'p')
			->orderBy('p.id', 'DESC');

		if($limit){
			$q->setMaxResults((int)$limit);
		}

		return $q->getQuery()->getResult();
	}
}
