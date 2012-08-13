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

	private $repository;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->repository = $entityManager->getRepository('\Flame\CMS\Models\Images\Image');
	}

	public function getOne($id)
	{
		return $this->repository->findOneById($id);
	}

	public function getLastImages()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

	public function delete(Image $image)
	{
		return $this->repository->delete($image);
	}

	public function save(Image $image)
	{
		return $this->repository->save($image);
	}
}
