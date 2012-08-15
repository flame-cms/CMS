<?php
/**
 * OptionFacade
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    09.07.12
 */

namespace Flame\CMS\Models\Options;

class OptionFacade extends \Nette\Object implements \Flame\Model\IFacade
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
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Options\Option');
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
	 * @param $name
	 * @return object
	 */
	public function getByName($name)
    {
        return $this->repository->findOneBy(array('name' => $name));
    }

	/**
	 * @return array
	 */
	public function getAll()
    {
        return $this->repository->findAll();
    }

	/**
	 * @param Option $option
	 * @return mixed
	 */
	public function save(Option $option)
    {
        return $this->repository->save($option);
    }

	/**
	 * @param Option $option
	 * @return mixed
	 */
	public function delete(Option $option)
    {
        return $this->repository->delete($option);
    }

	/**
	 * @param $name
	 * @return null
	 */
	public function getOptionValue($name)
    {
        $option = $this->repository->findOneBy(array('name' => $name));

        if($option){
            return $option->value;
        }else{
            return null;
        }
    }

}
