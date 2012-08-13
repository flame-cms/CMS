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

class PageRepository extends \Flame\Model\Repository
{
	public function findLast($limit)
	{
		$qb = $this->entityManager->createQueryBuilder();
		$q = $qb->select('p')
			->from('\Flame\CMS\Models\Pages\Page', 'p')
			->orderBy('p.id', 'DESC');

		if($limit){
			$q->setMaxResults((int)$limit);
		}

		return $q->getQuery()->getResult();
	}
}
