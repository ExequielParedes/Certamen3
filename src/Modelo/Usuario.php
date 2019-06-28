<?php
namespace Modelo;

class Usuario
{
	protected $nombre;
	protected $username;
	protected $password;
	protected $database;

	protected function __construct($container)
	{	
		$this->database = $container->database;
	}
	
	protected function udatos(){
		$arr = $this->database->select('usuario', ['nombre', 'username','pasword']);
		return $arr;
	}
	
	protected function uagregar($nombre,$usuario,$pass)
	{
		$this->database->query("insert into usuario(nombre,username,pasword)
		values('$nombre','$usuario','$pass');");
		$account_id = $this->database->id();
		return $account_id;
	}

	protected function umodificar($nombre,$username,$password,$z)
	{
		$udata = $this->database->query("update usuario set nombre = '$nombre',username = '$username',password = '$password' where id = $z");
		return $udata;
	}

	protected function ueliminar($ext)
	{
 		$this->$database->delete("usuario", ["AND" => ["id" => 31]]);
	}	
}