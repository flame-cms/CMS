<?php
/**
 * UsersInfoFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    23.07.12
 */

namespace Flame\CMS\Models\UsersInfo;

class UserInfoFacade extends \Nette\Object implements \Flame\Model\IFacade
{

	private $repository;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\UsersInfo\UserInfo');
	}

	public function getOne($id)
	{
		return $this->repository->findOneById($id);
	}

	public function save(UserInfo $user)
	{
		return $this->repository->save($user);
	}

	public function delete(UserInfo $user)
	{
		return $this->repository->delete($user);
	}

}
