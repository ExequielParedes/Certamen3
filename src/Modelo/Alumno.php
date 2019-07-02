<?php
namespace Modelo;


class Alumno
{
	protected $database;


	public function __construct($container)
	{	
		$this->database = $container->database;
	}


	public function datos()
	{
		$arr = $this->database->select('alumno', ['id','rut','carrera']);
		return $arr; 
	}


	public function un_alumno($id)
	{
		$data = $this->database->select("alumno",['rut','carrera'], ["id"=>$id]);
		return $data;
	}


	public function agregar($id,$rut,$carrera)
	{
		$this->database->insert("alumno",["id"=> $id,"rut"=>"$rut","carrera"=>"$carrera"]);
	}


	public function modificar($id,$rut,$carrera)
	{
		$data = $this->database->update("alumno",["rut"=>"$rut","carrera"=>"$carrera"],["id"=>$id]);
		return $data;	
	}

	public function eliminar($id)
	{
		$this->database->delete("alumno", ["AND" =>["id"=> $id] ]);
	}



}