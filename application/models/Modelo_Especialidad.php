<?php

class Modelo_Especialidad extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function SaveForm($form_data)
	{
		$this->db->insert('especialidad', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{

		return FALSE;
		}
	}

	function get_especialidades(){
		$this->db->select('id,nombre');
		$this->db->from('especialidad');

		$consulta = $this->db->get();
		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	function delete_especialidad($id){
		$this->db->where('id',$id);
		if($this->db->delete("especialidad") == true){
			redirect('Especialidad','refresh');
		}else{
			echo "Error al eliminar el registro";
		}
	}

	function detalles($id){
		$this->db->select('*');
		$this->db->from('especialidad');
		$this->db->where('especialidad.id', $id);
		$consulta = $this->db->get();
			return $resultado = $consulta->result_array();
	}

	public function update($form_data){
		$this->db->where('especialidad.id', $form_data['id']);
		$this->db->update('especialidad',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
