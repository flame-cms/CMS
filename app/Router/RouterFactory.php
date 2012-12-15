<?php

namespace Flame\CMS\Router;

use Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
		$router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);
		$router[] = new Route('admin/<presenter>/<action>[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Dashboard',
			'action' => 'default',
			'id' => null
		));
		$router[] = new Route('<presenter>/<action>[/<id>][/<slug>]', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'default',
			'id' => null,
			'slug' => null
		));
		return $router;
	}

}
