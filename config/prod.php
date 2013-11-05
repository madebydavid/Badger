<?php

// configure your app for the production environment

$app['cache.path'] = __DIR__ . '/../cache';

$app['config'] = array(
	'js_options' => array(
		'foo' => 'bar' 
	),
	'db.options' => array(
		'driver'	=> 'pdo_mysql',
		'dbname'	=> '',
		'user'		=> '',
		'password'	=> ''
	),
	'upload.dir' => __DIR__ . '/../web/uploads',
	'upload.path' => 'uploads'
);
