<?php

class Modelo_HistorialEconomico extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('historialeconomico', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{
			return false;
		}
	}

	public function getDetalles($id){
		$this->db->select('*');
		$this->db->from('historialeconomico');
		$this->db->where('historialeconomico.alumno_id', $id);
		$consulta = $this->db->get();
		return $respuesta  = $consulta->result_array();
	}

	public function update($form_data){
		$this->db->where('historialeconomico.id', $form_data['id']);
		$this->db->update('historialeconomico', $form_data);
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}
}
