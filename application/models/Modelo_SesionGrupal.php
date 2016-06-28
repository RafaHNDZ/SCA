<?php

class Modelo_SesionGrupal extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('sesiongrupal', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

	function get_SesionGrupal(){
		$this->db->select('id,nombreTutor,grupo,fecha');
		$this->db->from('sesiongrupal');
		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result();
			}else{
				return null;
			}
	}
}
?>
