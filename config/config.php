<?php 

return [
	'db'    => [
        'host'	=> 'localhost',
        'user'	=> 'root',
        'pass'	=> '',
        'dbname'	=> 'atmsproject_v2'
    ],
    'router'    => [
        'default_controller'    => 'Home',
        'default_action'        => 'index',
        'suffix'                => '.html'
    ],
    'basePath'  => dirname(__DIR__),
    'controllerPath'  => dirname(__DIR__) . DIRECTORY_SEPARATOR ."controllers",
];