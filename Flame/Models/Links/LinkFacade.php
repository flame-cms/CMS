<?php
/**
 * LinkFacade.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    15.10.12
 */

namespace Flame\CMS\Models\Links;

class LinkFacade extends \Flame\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Links\Link';

	/**
	 * @return array
	 */
	public function getLastLinks()
	{
		return $this->repository->findBy(array(), array('id' => 'DESC'));
	}

	/**
	 * @param $url
	 * @return object
	 */
	public function getLinkByUrl($url)
	{
		return $this->repository->findOneBy(array('url' => $url));
	}

	/**
	 * @param Link $link
	 * @return mixed
	 */
	public function increaseHit(Link $link)
	{
		$link->setHit($link->getHit() + 1);
		return $this->save($link);
	}

}
