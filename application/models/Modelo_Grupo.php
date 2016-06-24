<?php

class Modelo_Grupo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('grupo', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

	function get_Grupo(){
		$this->db->select('id,nombre,estado,especialidad_id,semestre_id,tutor_id,generacion_id,turno_id');
		$this->db->from('grupo');
	if(isset($datos['idG'])){
		$this->db->where('id', $datos['id']);
	}
		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('grupo') == true){
			redirect('Grupo','refresh');
		}else{
			echo "Error al eliminar el registro";
		}
	}
}
