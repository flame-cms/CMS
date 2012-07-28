<?php
/**
 * Bootstrap
 *
 * @author  Jiří Šifalda
 * @package Flame-sandbox
 *
 * @date    14.07.12
 */

use Flame\Config\Configurator,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\RouteList;

require LIBS_DIR . '/autoload.php';
//Is not required include nette and flame loader because it do the composer!

if(!defined('NETTE')) die ('You must load Nette loader first');

$configurator = new Configurator();
$configurator->setOptionalParameters();
$configurator->enableDebugger(WWW_DIR . '/../log');
$configurator->setTempDirectory(WWW_DIR . '/../temp');
$configurator->createRobotLoader()->addDirectory(APP_DIR)->register();
$configurator->addConfig(FLAME_DIR . '/Config/config.neon');
$container = $configurator->createContainer();

$doctrineConfig = $container->getService('EntityManagerConfig');
$doctrineConfig->setSQLLogger(\Flame\Utils\ConnectionPanel::register());

$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

$container->router[] = $adminRouter = new RouteList('Admin');
$adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Dashboard:default');

$container->router[] = $frontRouter = new RouteList('Front');
$frontRouter[] = new Route('<presenter>/<action>[/<id>][/<slug>]', 'Homepage:default');

if (PHP_SAPI == 'cli') {
	$container->console->run();
} else {
	$container->application->run();
}