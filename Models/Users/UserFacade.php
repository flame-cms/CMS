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

class UserFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Users\User';

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
}
