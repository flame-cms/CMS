<?php
define('TESTS_DIR', __DIR__);
define('WWW_DIR', __DIR__ . '/../www');
define('APP_DIR', WWW_DIR . '/../app');
define('LIBS_DIR', WWW_DIR . '/../libs');

require APP_DIR . '/bootstrap.php';

require __DIR__ . '/UnitTestCase.php';
require __DIR__ . '/IntegrationTestCase.php';
require __DIR__ . '/SeleniumTestCase.php';

