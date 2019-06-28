<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {

	$app->get('/usuarios', function ($request, $response) {
		$db = new \Modelo\Alumno($this);
		
		return $this->view->render($response, 'usuarios.html', 
			['alumno'=>$db->datos()]);
	});

	$app->get('/Tabla', function ($request, $response) {
		$db = new \Modelo\Alumno($this);
		
		return $this->view->render($response, 'usuarios_detalle.html', 
			['alumno'=>$db->datos()]);
	});

	$app->post('/actusuario1', function ($request, $response) {
		$op=$_POST["operacion"];
		$db = new \Modelo\Alumno($this);
		if ($op=="grabar") {
			$db->agregar($_POST["rut"],$_POST["nombre"],$_POST["carrera"],$_POST["usuario"],$_POST["password"]);
		}
		if ($op=="modificar") {
			$db->modificar($_POST["rut"],$_POST["nombre"],$_POST["carrera"],$_POST["usuario"],$_POST["password"]);
		}
		if ($op=="eliminar") {
			$db->eliminar($_POST["rut"]);
		}
		
		return $this->view->render($response, 'usuarios_detalle.html',['usuarios'=>$db->datos()]);
	});

};

