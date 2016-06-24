<?php

class Modelo_Canalizacion extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('canalizacion', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{

		return FALSE;
	}
}

function get_canalizacion(){

	$this->db->select('id, fecha, nombreAlumno');
	$this->db->from('canalizacion');
	$consulta = $this->db->get();
	if($consulta != null){
	return $resultado = $consulta->result();
		}else{
			return null;
		}
	}

}
