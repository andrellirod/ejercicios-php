<?php

require 'vendor/autoload.php';
require 'controllers/empleadoController.php';
require 'util/xml_util.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();


$app->get('/', function ()  use($app) {
    $email = $app->request->get('email');
    
    $e = new EmpleadoController();
    $lista = $e->buscarEmail($email);
    $app->render('index.php', compact('lista'));
});

$app->get('/ver/:id', function ($id)  use ($app){
	$e = new EmpleadoController();
	$obj = $e->buscarId($id);        
    $app->render('detalle.php', compact('obj'));
});

$app->get('/buscarsalario/:min/:max', function ($min,$max)  use ($app){
	
	$e = new EmpleadoController();
	$lista = $e->buscarSalario($min, $max);
	$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8" ?><BusquedaPorSalario></BusquedaPorSalario>');
        array_to_xml($lista, $xml);
	$app->response->headers->set('Content-Type', 'text/xml');
        $app->response->write($xml->asXML());
});


$app->run();
