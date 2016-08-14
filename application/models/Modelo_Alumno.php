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

  public function get_Fichas(){
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
		$this->db->select('alumno.*, alumno.id as idAlumno, alumno.nombre as nomAlu, alumno.apellidoP, alumno.apellidoM, alumno.grupo_id, grupo.nombre as nombreGrupo, grupo.id as idGrupo, turno.id as idTurno, turno.nombreTurno, nombreSemestre, nombreTurno, especialidad.nombre as nombreEspecialidad, tutor.nombre as nombreT, tutor.apellidoP as tutAP, tutor.apellidoM as tutAM');
		$this->db->from('alumno');
		$this->db->where('alumno.id',$id);
		$this->db->join('grupo','grupo.id = alumno.grupo_id');
		$this->db->join('turno','turno.id = grupo.turno_id');
		$this->db->join('semestre','semestre.id = grupo.semestre_id');
		$this->db->join('especialidad', 'especialidad.id = grupo.especialidad_id');
		$this->db->join('tutor', 'tutor.id = grupo.tutor_id');
		$consulta = $this->db->get();

		if($consulta){
			$resultado = $consulta->result_array();
			return $resultado;
		}else{
			return "Sin Resultados";
		}
	}

	public function update($form_data){
		$this->db->where('alumno.id', $form_data['id']);
		$this->db->update('alumno', $form_data);
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}

	public function toExcel($id){
		//Obtener los nombres de los campos
		$fields = $this->db->field_data('grupo');
		$this->db->select('alumno.*, direccion.*, historialmedico.*, historialfamiliar.*, historialeconomico.*, historialacademico.*');
		$this->db->from('alumno');
		$this->db->join('direccion', 'alumno.matricula = direccion.alumno_id');
		$this->db->join('historialmedico', 'alumno.matricula = historialmedico.alumno_id');
		$this->db->join('historialfamiliar', 'alumno.matricula = historialfamiliar.alumno_id');
		$this->db->join('historialeconomico', 'alumno.matricula = historialeconomico.alumno_id');
		$this->db->join('historialacademico', 'alumno.matricula = historialacademico.alumno_id');
		$this->db->where('alumno.id',$id);
		$query = $this->db->get();
		return array(
				"fields" => $fields,
				"query"  => $query
			);
	}

	public function toXML($id){
		$this->load->dbutil();
		$this->db->select('alumno.*, direccion.*, historialmedico.*, historialfamiliar.*, historialeconomico.*, historialacademico.*');
		$this->db->from('alumno');
		$this->db->join('direccion', 'alumno.matricula = direccion.alumno_id');
		$this->db->join('historialmedico', 'alumno.matricula = historialmedico.alumno_id');
		$this->db->join('historialfamiliar', 'alumno.matricula = historialfamiliar.alumno_id');
		$this->db->join('historialeconomico', 'alumno.matricula = historialeconomico.alumno_id');
		$this->db->join('historialacademico', 'alumno.matricula = historialacademico.alumno_id');
		$this->db->where('alumno.id',$id);
		$consulta = $this->db->get();
		$config = array(
			'root' => 		'Alumno',
			'element' =>	'data',
			'newline' => 	"\n",
			'tab' =>		"\t"
			);
		$respuestaXML = $this->dbutil->xml_from_result($consulta, $config);

			return $respuestaXML;
		}

	public function delete($id){
		$this->db->where('alumno.id', $id);
		$this->db->delete('alumno');
	}

}
