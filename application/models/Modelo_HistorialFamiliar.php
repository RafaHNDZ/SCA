<?php

class Modelo_HistorialFamiliar extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function SaveForm($form_data){
		$this->db->insert('historialfamiliar', $form_data);
 
		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}

		return FALSE;
	}

	public function getDetalles($id){
			$this->db->select('*');
			$this->db->from('historialfamiliar');
			$this->db->where('historialfamiliar.alumno_id', $id);
			$consulta = $this->db->get();
			if($consulta != NULL){
				$resultado = $consulta->result_array();
				return $resultado;
			}else{
				return "Sin datos";
			}
	}

	public function update($form_data){
		$this->db->where('historialfamiliar.id',$form_data['id']);
		$this->db->update('historialfamiliar',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
