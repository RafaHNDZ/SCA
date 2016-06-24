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

	function get_especialidades($data){
		$this->db->select('id,nombre');
		$this->db->from('especialidad');
	if(isset($especialidad_id)){
		$this->db->where('id',$especialidad_id);
	}
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
}
