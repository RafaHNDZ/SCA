<?php

class Modelo_HistorialAcademico extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function SaveForm($form_data){
		$this->db->insert('historialacademico', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}

		return FALSE;
	}

	public function getDetalles($id){
		$this->db->select('*');
		$this->db->from('historialacademico');
		$this->db->where('historialacademico.alumno_id', $id);
		$consulta = $this->db->get();

			return $respuesta = $consulta->result_array();

			return false;

	}

	public function update($form_data){
		$this->db->where('historialacademico.id',$form_data['id']);
		$this->db->update('historialacademico', $form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

}
