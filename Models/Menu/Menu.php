<?php
/**
 * Menu.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\Models\Menu;

/**
 * @Entity(repositoryClass="\Flame\Doctrine\Model\Repository")
 */
class Menu extends \Flame\Doctrine\Entity
{

	/**
	 * @Column(type="string", length=255)
	 */
	protected $title;

	/**
	 * @Column(type="string", length=255)
	 */
	protected $url;

	/**
	 * @Column(type="integer", length=5)
	 */
	protected $priority;

	public function __construct($title, $url)
	{
		$this->title = (string) $title;
		$this->url = (string) $url;

		$this->priority = 5;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = (string) $title;
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

	public function getPriority()
	{
		return $this->priority;
	}

	public function setPriority($priority)
	{
		$this->priority = (int) $priority;
		return $this;
	}

	public function __toString()
	{
		return (string) $this->title;
	}

}
