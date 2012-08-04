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
$configurator->enableDebugger(WWW_DIR . '/../log');
$configurator->setTempDirectory(WWW_DIR . '/../temp');
$configurator->createRobotLoader()->addDirectory(APP_DIR)->register();
$configurator->addConfig(FLAME_DIR . '/Config/config.neon', $configurator::AUTO);
$container = $configurator->createContainer();

if ($container->parameters['consoleMode']) {
	$container->router[] = new \Nette\Application\Routers\SimpleRouter();
} else {

	$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);
	$container->router[] = new Route('admin/<presenter>/<action>[/<id>]', array(
		'module' => 'Admin',
		'presenter' => 'Dashboard',
		'action' => 'default',
		'id' => null
	));
	$container->router[] = new Route('<presenter>/<action>[/<id>][/<slug>]', array(
		'module' => 'Front',
		'presenter' => 'Homepage',
		'action' => 'default',
		'id' => null,
		'slug' => null
	));
}

if (!$container->parameters['consoleMode'])
	$container->application->run();