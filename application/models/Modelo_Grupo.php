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
		$this->db->select('grupo.*, grupo.nombre as grup, especialidad.nombre as esp, turno.nombreTurno, semestre.nombreSemestre, tutor.nombre as tut, tutor.apellidoP, tutor.apellidoM, generacion.nombre as generacion');
		$this->db->from('grupo');
		$this->db->join('especialidad','especialidad.id = especialidad_id');
		$this->db->join('turno','turno.id = turno_id');
		$this->db->join('semestre','semestre.id = semestre_id');
		$this->db->join('tutor','tutor.id = tutor_id');
		$this->db->join('generacion', 'generacion.id = generacion_id');
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

	public function lista_grupo($id_grupo){

		$this->db->select('id, nombre, apellidoP, apellidoM, matricula');
		$this->db->from('alumno');
		$this->db->where('grupo_id',$id_grupo);
		$consulta = $this->db->get();

			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function num_grupos(){

		 $this->db->select('id, COUNT(id) as total');
		 $this->db->group_by('id'); 
		 $this->db->order_by('total', 'desc'); 
		 $consulta = $this->db->get('grupo', 10);

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
