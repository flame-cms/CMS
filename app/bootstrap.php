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

require __DIR__ . '/../libs/autoload.php';
//Is not required include nette loader because it do the composer!

$configurator = new Configurator();
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()->addDirectory(__DIR__)->register();
$configurator->addConfig(__DIR__ . '/Config/config.neon', $configurator::AUTO);
$configurator->addParameters(array(
	'appDir' => __DIR__,
	'wwwDir' => realpath(__DIR__ . '/../www'),
	'rootDir' => realpath(__DIR__ . '/..')
));
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

return $container;