<?php
/**
 * Bootstrap
 *
 * @author  Jiří Šifalda
 * @package Flame-sandbox
 *
 * @date    14.07.12
 */

use Nette\Application\Routers\Route,
	Nette\Application\Routers\RouteList;

require LIBS_DIR . '/autoload.php';
//Is not required include nette and flame loader because it do the composer!

$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

$container->router[] = $adminRouter = new RouteList('Admin');
	$adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Dashboard:default');

$container->router[] = $frontRouter = new RouteList('Front');
	$frontRouter[] = new Route('<presenter>/<action>[/<id>][/<slug>]', 'Homepage:default');
