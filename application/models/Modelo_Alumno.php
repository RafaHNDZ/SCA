<?php

class Modelo_Alumno extends CI_Model {

	function __construct(){

		parent::__construct();
		$this->load->model('Modelo_Calendario');
	}

  public function SaveForm($form_data){

		$this->db->insert('alumno', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{

		return FALSE;
	  }
  }

  public function get_Ficha(){
		$this->db->select('alumno.id, alumno.nombre, apellidoP, apellidoM, fechaNacimiento, telefono, matricula, grupo_id, grupo.nombre as nombreGrupo');
		$this->db->from('alumno');
		$this->db->join('grupo','grupo.id = grupo_id');
		$consulta = $this->db->get();
		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

		public function num_alumnos(){

		 $this->db->select('id, COUNT(id) as total');
		 $this->db->group_by('id');
		 $this->db->order_by('total', 'desc');
		 $consulta = $this->db->get('alumno', 10);

			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function get_alumno_data($id){
		$this->db->select('alumno.id, alumno.nombre as nomAlu, alumno.apellidoP, alumno.apellidoM, alumno.grupo_id, grupo.nombre as nombreGrupo, turno.nombreTurno');
		$this->db->from('alumno');
		$this->db->where('alumno.id',$id);
		$this->db->join('grupo','grupo.id = alumno.grupo_id');
		$this->db->join('turno','turno.id = grupo.turno_id');
		$consulta = $this->db->get();

		if($consulta){
			$resultado = $consulta->result_array();
			return $resultado;
		}else{
			return "Sin Resultados";
		}
	}

}
