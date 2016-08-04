<?php

class Modelo_Generacion extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('generacion', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

	function get_Generacion(){
		$this->db->select('id,nombre');
		$this->db->from('generacion');
		$consulta = $this->db->get();
		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	function detalles($id){
		$this->db->select('id,nombre');
		$this->db->from('generacion');
		$this->db->where('generacion.id', $id);
		$consulta = $this->db->get();
			return $resultado = $consulta->result_array();
	}

	function delete($id){
		$this->db->where('id',$id);
			if($this->db->delete('generacion') == true){
				redirect('Generacion','refresh');
			}else{
				echo "Error al borrar el registro";
			}
		}

	public function update($form_data){
		$this->db->where('generacion.id', $form_data['id']);
		$this->db->update('generacion',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
?>
