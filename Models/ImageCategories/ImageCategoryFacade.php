<?php
/**
 * ImageCategoryFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    21.11.12
 */

namespace Flame\CMS\Models\ImageCategories;

class ImageCategoryFacade extends \Flame\Doctrine\Model\Facade
{

	/** @var string */
	protected $repositoryName = 'Flame\CMS\Models\ImageCategories\ImageCategory';

	/**
	 * @return array
	 */
	public function getImageCategories()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

}
