<?php

class Modelo_Semestre extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('semestre', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
        }

	function get_Semestre(){
		$this->db->select('id,nombreSemestre');
		$this->db->from('semestre');
		$consulta = $this->db->get();
			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function get_detalles($id){
		$this->db->select('id,nombreSemestre');
		$this->db->from('semestre');
		$this->db->where('semestre.id',$id);
		$consulta = $this->db->get();
			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	function del_Semestre($id){
		$this->db->where('id',$id);
		if($this->db->delete('semestre') == true){
			redirect('Semestre','refresh');
		}else{
			echo "Error al borrar el registro";
		}
	}

	public function update($form_data){
		$this->db->where('semestre.id', $form_data['id']);
		$this->db->update('semestre',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
