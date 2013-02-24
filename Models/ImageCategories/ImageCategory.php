<?php
/**
 * ImageCategories.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    21.11.12
 */

namespace Flame\CMS\Models\ImageCategories;

/**
 * @Entity(repositoryClass="\Flame\Doctrine\Model\Repository")
 */
class ImageCategory extends \Flame\Doctrine\Entity
{

	/**
	 * @Column(type="string", length=255)
	 */
	protected $name;

	/**
	 * @Column(type="string", length=255)
	 */
	protected $slug;

	/**
	 * @Column(type="string", length=10000)
	 */
	protected $description;

	public function __construct($name, $slug)
	{
		$this->name = (string) $name;
		$this->slug = (string) $slug;

		$this->description = '';
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

	public function getSlug()
	{
		return $this->slug;
	}

	public function setSlug($slug)
	{
		$this->slug = (string) $slug;
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

}
