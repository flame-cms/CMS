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

class OptionFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Options\Option';

	/**
	 * @var array
	 */
	private $availableOptions = array(
		'Name', 'Thumbnail:Width', 'Thumbnail:Height', 'ItemsPerPage', 'Menu:NewsreelCount', 'Menu:TagsCount',
		'Theme'
	);

	/**
	 * @return array
	 */
	public function getAvailableOptions()
	{
		return $this->availableOptions;
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
	public function getLastOptions()
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
