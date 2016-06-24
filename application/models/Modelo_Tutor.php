<?php
class Modelo_Tutor extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('tutor', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{
			return FALSE;
		}
    }

	function get_Tutor(){
		$this->db->select('id,nombre,apellidoP,apellidoM,privilegios,estado');
			$this->db->from('tutor');
			$consulta = $this->db->get();
			if($consulta != null){
			return $data =$consulta->result_array();
				}else{
					return null;
				}
		}

}
