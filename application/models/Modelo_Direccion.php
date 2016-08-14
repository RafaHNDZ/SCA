<?php

class Modelo_Direccion extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('direccion', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{

		return FALSE;
	  }
  	}

  	public function getDireccion($id){
  		$this->db->select('*');
  		$this->db->from('direccion');
  		$this->db->where('direccion.alumno_id',$id);
			$consulta = $this->db->get();

			if($consulta){
				$resultado = $consulta->result_array();
				return $resultado;
			}else{
				return "Sin Resultados";
			}
  	}

		public function update($form_dataD){
			$this->db->where('direccion.idDireccion', $form_dataD['idDireccion']);
			$this->db->update('direccion', $form_dataD);
			if($this->db->affected_rows() == '1'){
				return true;
			}else{
				return false;
			}

		}

  }
