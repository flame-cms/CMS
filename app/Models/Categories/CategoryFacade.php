<?php
/**
 * CategoryFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.07.12
 */

namespace Flame\CMS\Models\Categories;

class CategoryFacade extends \Nette\Object
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
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\Categories\Category');
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
	public function getOneByName($name)
	{
		return $this->repository->findOneBy(array('name' => (string) $name));
	}

	/**
	 * @return array
	 */
	public function getLastCategories()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

	/**
	 * @param Category $category
	 * @return mixed
	 */
	public function save(Category $category)
	{
		return $this->repository->save($category);
	}

	/**
	 * @param Category $category
	 * @return mixed
	 */
	public function delete(Category $category)
	{
		return $this->repository->delete($category);
	}

}
