<?php
/**
 * CommentFacade
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    10.07.12
 */

namespace Flame\CMS\Models\Comments;

use \Flame\CMS\Models\Comments\Comment;

class CommentFacade extends \Nette\Object implements \Flame\Model\IFacade
{

	/**
	 * @var \Doctrine\ORM\EntityRepository
	 */
	private $repository;

	/**
	 * @param \Doctrine\ORM\EntityManager $entityManager
	 */
	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository('\Flame\CMS\Models\Comments\Comment');
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
	 * @return array
	 */
	public function getLastComments()
    {
        return $this->repository->findAll();
    }

	/**
	 * @param $id
	 * @return array
	 */
	public function getPublishCommentsInPost($id)
    {
        return $this->repository->findBy(array('post' => $id, 'publish' => '1' ));
    }

	/**
	 * @param Comment $comment
	 * @return mixed
	 */
	public function save(Comment $comment)
    {
        return $this->repository->save($comment);
    }

	/**
	 * @param Comment $comment
	 * @return mixed
	 */
	public function delete(Comment $comment)
    {
        return $this->repository->delete($comment);
    }
}
