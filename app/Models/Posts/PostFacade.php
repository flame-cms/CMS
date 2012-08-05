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

class PostFacade extends \Nette\Object
{

    private $repository;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Posts\Post');
    }

    public function getLastPosts($query = false, $limit = 10)
    {
	    if($query){
		    return $this->repository->findAllQuery($limit);
	    }else{
		    return $this->repository->findBy(array(), array('id'=> 'DESC'));
	    }

    }

	public function getLastPublishPostsPaginator($first, $limit = 10)
	{
		return new \Doctrine\ORM\Tools\Pagination\Paginator($this->repository->findPublishedQuery($first, $limit), true);
	}

    public function getLastPublishPosts($query = false, $limit = 10)
    {
	    return $this->repository->findBy(array('publish' => '1'), array('id'=> 'DESC'));
    }

    public function getOne($id){
	    return $this->repository->findOneById($id);
    }

	public function increaseHit(Post $post)
	{
		$post->setHit($post->getHit() + 1);
		return $this->persist($post);
	}

    public function delete(Post $post)
    {
        return $this->repository->delete($post);
    }

    public function persist(Post $post)
    {
        return $this->repository->save($post);
    }
}
