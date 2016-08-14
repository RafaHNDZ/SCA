<?php

class Modelo_HistorialMedico extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('historialmedico', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{
		return FALSE;
		}
	}

	public function get_data($id){
		$this->db->select('*');
		$this->db->from('historialmedico');
		$this->db->where('historialmedico.alumno_id', $id);
		$consulta = $this->db->get();
		return $respuesta = $consulta -> result_array();
	}

	public function update($form_data){
		$this->db->where('historialmedico.id', $form_data['id']);
		$this->db->update('historialmedico', $form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
