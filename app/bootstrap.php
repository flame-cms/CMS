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
	Nette\Application\Routers\RouteList,
	Nette\Config\Configurator;

require LIBS_DIR . '/autoload.php';
require LIBS_DIR . '/nette/nette/Nette/loader.php';
require LIBS_DIR . '/jsifalda/flame/Flame/loader.php';

if(!defined('FLAME_DIR')) die('You must load Flame loader');

$configurator = new Configurator();
$configurator->enableDebugger(WWW_DIR . '/../log');
$configurator->setTempDirectory(WWW_DIR . '/../temp');
$configurator->addParameters(array('flameDir' => FLAME_DIR));
$configurator->createRobotLoader()->addDirectory(APP_DIR)->addDirectory(FLAME_DIR)->register();

if (PHP_SAPI == 'cli') {
	$configurator->setDebugMode(TRUE);
	$configurator->addConfig(FLAME_DIR . '/Config/config.neon', $configurator::DEVELOPMENT);
}else{
	$configurator->setDebugMode($configurator::AUTO);
	$configurator->addConfig(FLAME_DIR . '/Config/config.neon');
}

$container = $configurator->createContainer();

$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

$container->router[] = $adminRouter = new RouteList('Admin');
	$adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Dashboard:default');

$container->router[] = $frontRouter = new RouteList('Front');
	$frontRouter[] = new Route('<presenter>/<action>[/<id>][/<slug>]', 'Homepage:default');

// Configure and run the application!
$container->application->run();
