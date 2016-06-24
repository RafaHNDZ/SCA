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

	function delete($id){
		$this->db->where('id',$id);
			if($this->db->delete('generacion') == true){
				redirect('Generacion','refresh');
			}else{
				echo "Error al borrar el registro";
			}
		}
}
?>
