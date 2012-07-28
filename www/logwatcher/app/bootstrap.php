<?php

use Nette\Diagnostics\Debugger,
    Nette\Application\Routers\Route;

// Load libraries
require __DIR__ . '/../libs/Nette/loader.php';

// Enable Nette Debugger for error visualisation & logging
Debugger::$logDirectory = FALSE; // Logging in app for viewing logs? // For debugging: __DIR__.'/../logs';
//Debugger::$strictMode = TRUE;
Debugger::enable();

// Configure application
$configurator = new Nette\Config\Configurator;
$configurator->setTempDirectory(__DIR__ . '/../temp');

// RobotLoad all classes
$configurator->createRobotLoader()
        ->addDirectory(__DIR__)
        ->addDirectory(__DIR__ . '/../libs')
        ->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config.neon', FALSE);
$container = $configurator->createContainer();

// Cache clearing script called from remote; See https://gist.github.com/1622669
$input = file_get_contents('php://input');
$input = json_decode($input, true);
if (isset($input['application_update'])) {

    // Authenticate
    $authenticator = $container->getByType('Nette\Security\SimpleAuthenticator');
    $credentials = array('remote', $input['application_update']);

    try {
        $authenticator->authenticate($credentials);
    } catch (\Nette\Security\AuthenticationException $e) {
        print('LOGIN FAILURE '. $e->getMessage());
        die;
    }

    // Clear the app
    $container->getService('temporaryFiles')->remove();

    // Make cache dir again (0777 mode is default)
    mkdir($container->getService('temporaryFiles')->getDirectory() . '/cache');

    print('SUCCESS');
    die;
}

// Setup router
$container->router[] = new Route('<presenter>/<action>[/<id>]', 'Log:default');


// Run the application!
$application = $container->application;
$application->catchExceptions = Debugger::$productionMode;
$application->errorPresenter = 'Error';
$application->run();