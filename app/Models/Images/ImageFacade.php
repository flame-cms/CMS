<?php
/**
 * ImageFacade
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    11.07.12
 */

namespace Flame\CMS\Models\Images;

class ImageFacade extends \Nette\Object implements \Flame\Model\IFacade
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
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\Images\Image');
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
	public function getLastImages()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

	/**
	 * @param Image $image
	 * @return mixed
	 */
	public function delete(Image $image)
	{
		return $this->repository->delete($image);
	}

	/**
	 * @param Image $image
	 * @return mixed
	 */
	public function save(Image $image)
	{
		return $this->repository->save($image);
	}
}
