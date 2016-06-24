<?php

class Modelo_Turno extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('turno', $form_data);

		if ($this->db->affected_rows() == '1'){

			return TRUE;
		}else{

			return FALSE;

		}
	}

	function get_Turno(){
		$this->db->select('id,nombreTurno');
		$this->db->from('turno');
		$consulta = $this->db->get();
		if($consulta != null){
		return $data =$consulta->result_array();
			}else{
				return null;
			}
	}

	function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('turno') == true){
			redirect('Turno','refresh');
		}else{
			echo "Error al eliminar el registro";
		}
	}
}
