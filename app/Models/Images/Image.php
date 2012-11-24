<?php
/**
 * Image
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    11.07.12
 */

namespace Flame\CMS\Models\Images;

/**
 * @Entity(repositoryClass="ImageRepository")
 */
class Image extends \Flame\Doctrine\Entity
{

    /**
     * @Column(type="string", length=150)
     */
    protected $file;

    /**
     * @Column(type="string", length=100)
     */
    protected $name;

    /**
     * @Column(type="string", length=250)
     */
    protected $description;

	/**
	 * @Column(type="boolean")
	 */
	protected $public;

	/**
	 * @ManyToOne(targetEntity="\Flame\CMS\Models\ImageCategories\ImageCategory")
	 * @JoinColumn(onDelete="SET NULL")
	 */
	protected $category;

    public function __construct($file)
    {
        $this->file = (string) $file;

	    $this->name = '';
        $this->description = '';
	    $this->public = false;
	    $this->category = null;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = (string) $file;
        return $this;
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

	public function getCategory()
	{
		return $this->category;
	}

	public function setCategory(\Flame\CMS\Models\ImageCategories\ImageCategory $category)
	{
		$this->category = $category;
		return $this;
	}
}
