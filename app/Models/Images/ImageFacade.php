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

class ImageFacade extends \Flame\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Images\Image';

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
	 * @return array
	 */
	public function getLastPublicImages()
	{
		return $this->repository->findBy(array('public' => true), array('id' => 'DESC'));
	}
}
