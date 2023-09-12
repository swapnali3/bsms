<?php

$_SERVER[ 'HTTP_HOST' ] = 'localhost'; // or something like yourdomain.tld
require dirname(__DIR__) . '/config/bootstrap.php';

use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Routing\DispatcherFactory;

if(PHP_SAPI == "cli" && $argc == 2) {
	$dispatcher = DispatcherFactory::create();
	$dispatcher->dispatch(
	    new Request($argv[1]),
	    new Response()
	);
}
else {
	exit;
}