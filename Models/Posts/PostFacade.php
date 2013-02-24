<?php
/**
 * PostFacade
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    10.07.12
 */

namespace Flame\CMS\Models\Posts;

class PostFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected $repositoryName = '\Flame\CMS\Models\Posts\Post';

	/**
	 * @param $id
	 * @return mixed
	 */
	public function getOne($id){
		return $this->repository->findOneById($id);
	}

	/**
	 * @return array
	 */
    public function getLastPosts()
    {
		return $this->repository->findBy(array(), array('id'=> 'DESC'));
    }

	/**
	 * @param $first
	 * @param int $limit
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	public function getLastPostsPaginator($first, $limit = 10)
	{
		return new \Doctrine\ORM\Tools\Pagination\Paginator($this->repository->findAllQuery($first, $limit));
	}

	/**
	 * @return array
	 */
    public function getLastPublishPosts()
    {
	    return $this->repository->findBy(array('publish' => '1'), array('id'=> 'DESC'));
    }

	/**
	 * @param $first
	 * @param int $limit
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	public function getLastPublishPostsPaginator($first, $limit = 10)
	{
		return new \Doctrine\ORM\Tools\Pagination\Paginator($this->repository->findPublishedQuery($first, $limit));
	}

	/**
	 * @param Post $post
	 * @return mixed
	 */
	public function increaseHit(Post $post)
	{
		$post->setHit($post->getHit() + 1);
		return $this->save($post);
	}
}
