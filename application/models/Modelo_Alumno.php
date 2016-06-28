<?php

class Modelo_Alumno extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('alumno', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{

		return FALSE;
	  }
  }

  function get_Ficha(){
		$this->db->select('id,nombre,apellidoP,apellidoM,fechaNacimiento');
		$this->db->from('alumno');
		$consulta = $this->db->get();
		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

}
