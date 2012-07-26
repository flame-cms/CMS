<?php

define('WWW_DIR', __DIR__ . '/..');
define('APP_DIR', WWW_DIR . '/app');
define('LIBS_DIR', WWW_DIR . '/vendor');

require APP_DIR . '/bootstrap.php';

require __DIR__ . '/UnitTestCase.php';
require __DIR__ . '/IntegrationTestCase.php';
require __DIR__ . '/SeleniumTestCase.php';