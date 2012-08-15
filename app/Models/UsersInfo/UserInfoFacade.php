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

	/**
	 * @var \Doctrine\ORM\EntityRepository
	 */
	private $repository;

	/**
	 * @param \Doctrine\ORM\EntityManager $entityManager
	 */
	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\UsersInfo\UserInfo');
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
	 * @param UserInfo $user
	 * @return mixed
	 */
	public function save(UserInfo $user)
	{
		return $this->repository->save($user);
	}

	/**
	 * @param UserInfo $user
	 * @return mixed
	 */
	public function delete(UserInfo $user)
	{
		return $this->repository->delete($user);
	}

}
