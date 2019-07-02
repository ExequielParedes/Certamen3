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
		$db = new \Modelo\clUsuario($this);
		$dbp = new \Modelo\clPerfil($this);
		return $this->view->render($response, 'usuarios.html', 
			['usuarios'=>$db->datos(),'perfiles'=>$dbp->datos()]);
	});

	$app->post('/actusuario', function ($request, $response) {
		$op=$_POST["operacion"];
		$db = new \Modelo\clUsuario($this);
		if ($op=="grabar") {
			$db->agregar($_POST["codigo"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="modificar") {
			$db->modificar($_POST["codigo"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="eliminar") {
			$db->eliminar($_POST["codigo"]);
		}
		return $this->view->render($response, 'usuarios_detalle.html',['usuarios'=>$db->datos()]);
	});




	$app->get('/usuario2', function ($request, $response) {
		$db = new \Modelo\Usuarios($this);
		$dbp = new \Modelo\Alumno($this);
		return $this->view->render($response, 'usuarios_2.html', 
			['usuarios2'=>$db->datos(),'alumnos'=>$dbp->datos()]);
	});


	$app->get('/alumnos', function ($request, $response) {
		$db = new \Modelo\Usuarios($this);
		$dbp = new \Modelo\Alumno($this);
		return $this->view->render($response, 'nuevoAlumno.html', 
			['usuarios2'=>$db->datos(),'alumnos'=>$dbp->datos()]);
	});


		$app->post('/actalumno', function ($request, $response) {
		$op=$_POST["operacion"];
		$db = new \Modelo\clUsuario($this);
		if ($op=="grabar") {
			$db->agregar($_POST["rut"],$_POST["nombre"],$_POST["username"],$_POST["pass"],$_POST["carrera"]);
		}
		if ($op=="modificar") {
			$db->modificar($_POST["rut"],$_POST["nombre"],$_POST["username"],$_POST["pass"],$_POST["carrera"]);
		}
		if ($op=="eliminar") {
			
		}
		return $this->view->render($response, 'nuevoAlumno.html',['Alumno'=>$db->datos()]);
	});

};

