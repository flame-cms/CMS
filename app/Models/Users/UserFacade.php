<?php
/**
 * UserFacade
 *
 * @author  Jiří Šifalda
 * @package
 *
 * @date    09.07.12
 */

namespace Flame\CMS\Models\Users;

class UserFacade extends \Nette\Object implements \Flame\Model\IFacade
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
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Users\User');
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
	 * @return array
	 */
	public function getLastUsers()
    {
        return $this->repository->findAll();
    }

	/**
	 * @param $email
	 * @return object
	 */
	public function getByEmail($email)
    {
        return $this->repository->findOneBy(array('email' => $email));
    }

	/**
	 * @param User $user
	 * @return mixed
	 */
	public function save(User $user)
    {
        return $this->repository->save($user);
    }

	/**
	 * @param User $user
	 * @return mixed
	 */
	public function delete(User $user)
    {
        return $this->repository->delete($user);
    }
}
