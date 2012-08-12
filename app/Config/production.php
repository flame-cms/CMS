<?php
/**
 * production.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    28.07.12
 */

return array(
	'parameters' => array(
		'database' => array(
			'host' => (isset($_SERVER['DB1_HOST'])) ? $_SERVER['DB1_HOST'] : '',
			'dbname' => (isset($_SERVER['DB1_NAME'])) ? $_SERVER['DB1_NAME'] : '',
			'user' => (isset($_SERVER['DB1_USER'])) ? $_SERVER['DB1_USER'] : '',
			'password' => (isset($_SERVER['DB1_PASS'])) ? $_SERVER['DB1_PASS'] : '',
			'port' => (isset($_SERVER['DB1_PORT'])) ? $_SERVER['DB1_PORT'] : 3306,
		),
	),
);