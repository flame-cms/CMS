<?php
/**
 * Link.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    15.10.12
 */

namespace Flame\CMS\Models\Links;

/**
 * @Entity(repositoryClass="\Flame\Model\Repository")
 */
class Link extends \Flame\Doctrine\Entity
{

	/**
	 * @Column(type="string", length=255)
	 */
	protected $name;

	/**
	 * @Column(type="string", length=255)
	 */
	protected $url;

	/**
	 * @Column(type="string", length=500)
	 */
	protected $description;

	/**
	 * @Column(type="boolean")
	 */
	protected $public;

	public function __construct($name, $url)
	{
		$this->name = $name;
		$this->url = $url;

		$this->description = '';
		$this->public = true;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = (string) $name;
		return $this;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function setUrl($url)
	{
		$this->url = (string) $url;
		return $this;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = (string) $description;
		return $this;
	}

	public function getPublic()
	{
		return $this->public;
	}

	public function setPublic($public)
	{
		$this->public = (bool) $public;
		return $this;
	}
}
