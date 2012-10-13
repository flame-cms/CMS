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

class OptionFacade extends \Flame\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Options\Option';

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
	 * @param $name
	 * @return null
	 */
	public function getOptionValue($name)
    {
	    $value = $this->repository->findOneBy(array('name' => $name));
	    return $value ? $value->value : null;
    }

}
