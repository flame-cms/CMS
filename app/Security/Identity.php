<?php
/**
 * Identity.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    22.07.12
 */

namespace Flame\CMS\Security;

class Identity extends \Nette\Security\Identity
{

	/**
	 * @var \Flame\CMS\Models\Users\User
	 */
	private $user;

	/**
	 * @param \Flame\CMS\Models\Users\User $user
	 */
	public function __construct(\Flame\CMS\Models\Users\User $user)
	{
		$this->user = $user;
		$this->user->setPassword(null);

		parent::__construct($this->user->getId(),$this->user->getRole(), $this->getUserData());

		$this->user->setInfoNull();
	}

	/**
	 * @return \Flame\CMS\Models\Users\User
	 */
	public function getUserModel()
	{
		return $this->user;
	}

	/**
	 * @return array
	 */
	private function getUserData()
	{
		$userInfo = $this->user->getInfo() ? $this->user->getInfo()->toArray(): null;
		if(isset($userInfo['id'])) unset($userInfo['id']);
		$data = array('email' => $this->user->getEmail());
		if(is_array($userInfo)) $data = array_merge($data, $userInfo);
		return $data;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return (string) (isset($this->data['email'])) ? $this->data['email'] : '';
	}

}
