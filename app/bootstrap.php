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

return $container;