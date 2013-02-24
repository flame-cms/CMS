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

class CommentFacade extends \Flame\Doctrine\Model\Facade
{

	/**
	 * @var string
	 */
	protected  $repositoryName = '\Flame\CMS\Models\Comments\Comment';

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
}
