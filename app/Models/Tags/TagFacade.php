<?php
/**
 * TagFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.07.12
 */

namespace Flame\CMS\Models\Tags;

class TagFacade extends \Flame\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Tags\Tag';

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
	 * @param null $limit
	 * @return array
	 */
	public function getLastTags($limit = null)
	{
		if($limit){
			return $this->repository->findBy(array(), array('id' => 'DESC'), $limit);
		}else{
			return $this->repository->findBy(array(), array('id' => 'DESC'));
		}
	}
}
