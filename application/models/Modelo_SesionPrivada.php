<?php

class Modelo_SesionPrivada extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('sesionprivada', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

  function get_SesionPrivada(){
		$this->db->select('id,nombreAlumno,grupo,fecha');
		$this->db->from('sesionprivada');
		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result();
			}else{
				return null;
			}
	}
}
?>
